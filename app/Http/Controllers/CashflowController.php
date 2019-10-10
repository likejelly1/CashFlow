<?php

namespace App\Http\Controllers;

use App\Inflow;
use App\NettSales;
use App\Project;
use App\Outflow;
use App\Estimated;
use App\Commission;
use App\RealCommission;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Response;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // view main cashflow
    public function index()
    {
        $projects = Project::all();
        return view('cashflow.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // store data to db inflow 
    public function store(Request $request)
    {
        $nettsales = new NettSales();
        $total_nett_sales = (empty($nettsales->getTotal($request->project_id)->total_amount)) ? 0 : $nettsales->getTotal($request->project_id)->total_amount;
        $inflow = new Inflow();
        $inflow->project_id = $request->project_id;
        $inflow->billing = $request->billing;
        $inflow->execution_date = $request->execution_date;
        $inflow->percent = $request->percent;
        $inflow->subtotal = $request->percent / 100 * $total_nett_sales;
        $inflow->save();
        return redirect()->back();
    }

    // store data to db outflow
    public function storeOut(Request $request)
    {
        $outflow = new Outflow();
        $outflow->project_id = $request->project_id;
        $outflow->description = $request->description;
        $outflow->execution_date = $request->execution_date;
        if ($request->cost == '') {
            $request->cost = '0';
        }
        $outflow->cost = str_replace(',', '', $request->cost);
        $outflow->save();
        return redirect()->back();
    }

    public function storeEst(Request $request)
    {
       $estimated = new Estimated();
       $estimated->project_id = $request->project_id;
       $estimated->percent = $request->percent;
       $estimated->amount = str_replace(',', '', $request->amount);
       $estimated->save();
        return redirect()->back();
    }

    public function storeRealCommission(Request $request)
    {
        $commissions = new Commission();
        $total_commissions = (empty($commissions->getTotal($request->project_id)->total_amount)) ? 0 : $commissions->getTotal($request->project_id)->total_amount;

        $real_commission = new RealCommission();
        $real_commission->project_id = $request->project_id;
        $real_commission->execution_date = $request->execution_date;
        $real_commission->total = $total_commissions;
        $real_commission->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // view inflow
    public function show($id)
    {
        $projects = Project::find($id);
        $inflow = Inflow::where('project_id', $id)->get();
        $nettsales = new NettSales();
        $total_nett_sales = (empty($nettsales->getTotal($id)->total_amount)) ? 0 : $nettsales->getTotal($id)->total_amount ;

        // all total inflow
        if (!empty($projects->inflow)) {
            for ($i = 0; $i < count($projects->inflow); $i++) {
                $percent[$i] = $projects->inflow[$i]->percent;
                $sub_total[$i] = $percent[$i] / 100 * $total_nett_sales;
            }
            if (!empty($sub_total)) {
                $total = array_sum($sub_total);
            } else {
                $total = 0;
            }
        } else {
            $total = 0;
        }

        // total per month
        $monthlyIn = DB::table('inflow')
            ->select(DB::raw('SUM(subtotal) as total_monthlyIn, MONTHNAME(execution_date) as month, YEAR(execution_date) as year'))
            ->where('project_id', $id)
            ->groupBy(DB::raw('YEAR(execution_date) ASC, MONTHNAME(execution_date) ASC'))->get();

        return view('cashflow.inflow', compact('inflow', 'projects', 'total', 'monthlyIn', 'total_nett_sales'));
    }

    // view outflow
    public function showOutflow($id)
    {
        $projects = Project::find($id);
        $inflow = Inflow::find($id);
        $outflow = Outflow::where('project_id', $id)->get();


        // all total outflow
        if (!empty($projects->outflow)) {
            for ($i = 0; $i < count($projects->outflow); $i++) {
                $description[$i] = $projects->outflow[$i]->description;
                $cost[$i] = $projects->outflow[$i]->cost;
            }
            if (!empty($cost)) {
                $total = array_sum($cost);
            } else {
                $total = 0;
            }
        } else {
            $total = 0;
        }

        // detail cost per description
        $outflow = DB::table('outflow')
            ->select(DB::raw('sum(cost) as total_cost, description'))
            ->where('project_id', $id)
            ->groupBy('description')
            ->get();

        // total per month
        $monthlyOut = DB::table('outflow')
            ->select(DB::raw('SUM(cost) as total_monthlyOut, MONTHNAME(execution_date) as month, YEAR(execution_date) as year'))
            ->where('project_id', $id)
            ->groupBy(DB::raw('YEAR(execution_date) ASC, MONTHNAME(execution_date) ASC'))
            ->get();

        return view('cashflow.outflow', compact('outflow', 'inflow', 'projects', 'monthlyOut', 'total'));
    }

    // view realization
    public function showReal($id)
    {
        $projects = Project::find($id);
        $outflow = Outflow::where('project_id', $id)->get();
        $inflow = Inflow::where('project_id', $id)->get();
        $estimated = Estimated::where('project_id', $id)->get();

        $real_commission = RealCommission::where('project_id', $id)->get();

        $commissions = Commission::where('project_id', $id)->get();
        $total_commissions = new Commission();
        $total_commissions = (empty($total_commissions->getTotal($id))) ? 0 : $total_commissions->getTotal($id)->total_amount;

        //total per month surplus
        $surplus = DB::table('inflow')
            ->join('outflow', DB::Raw('EXTRACT(YEAR_MONTH FROM inflow.execution_date)'), '=', DB::Raw('EXTRACT(YEAR_MONTH FROM outflow.execution_date)'))
            ->select(DB::raw('SUM(subtotal) as total_in , SUM(outflow.cost) as total_out, MONTHNAME(outflow.execution_date) as month, YEAR(outflow.execution_date) as year'))
            ->where([
                ['inflow.project_id', $id],
                ['outflow.project_id', $id],
            ])
            ->groupBy(DB::raw('MONTHNAME(outflow.execution_date) desc, YEAR(outflow.execution_date) desc'))
            ->get();

        for ($i = 0; $i < sizeof($surplus); $i++) {
           if ($surplus[$i]->total_in == 0 && $surplus[$i]->total_out == 0) {
                $surplus[$i]->total_surp = 0;
            } elseif ($surplus[$i]->total_in == 0 && $surplus[$i]->total_out != 0 || $surplus[$i]->total_in != 0 && $surplus[$i]->total_out == 0){
                $surplus[$i]->total_surp = $surplus[$i]->total_in + $surplus[$i]->total_out;
            }
            else {
                $surplus[$i]->total_surp = $surplus[$i]->total_in - $surplus[$i]->total_out;
            }
        }

        // total surplus
        if (!empty($projects->outflow) && !empty($projects->inflow)) {
            $inflowArray = [];
            foreach ($projects->inflow as $key => $pro) {
                $inflowArray[$key] = $pro->subtotal;
            }

            $outflowArray = [];
            foreach ($projects->outflow as $key => $pro) {
                $outflowArray[$key] = $pro->cost;
            }

            $totalInflow = array_sum($inflowArray);
            $totalOutflow = array_sum($outflowArray);

            $total = $totalInflow - $totalOutflow;
        }
        
        // total per month cummulative surplus
        for ($i = 0; $i < sizeOf($surplus); $i++) {
            if ($i == 0) {
                $cum_surp[$i] = $surplus[$i]->total_surp;
            } else {
                $cum_surp[$i] = $cum_surp[$i - 1] + $surplus[$i]->total_surp;
            }
        }

        // total per month estimated
        $estimated = DB::table('estimated')
            ->select(DB::raw('SUM(percent/12*amount) as total_est'))
            ->where('project_id', $id)
            ->get();

        for ($i = 0; $i < sizeOf($surplus); $i++) {
            if ($i == 0) {
                $sum_est[$i] = $surplus[$i]->total_surp = 0;
            } else {
                $sum_est[$i] = $estimated;
            }
        }

        return view('cashflow.realization', compact('projects', 'outflow', 'inflow','total_commissions','estimated','real_commission', 'surplus', 'total_in', 'total_out', 'total_surp', 'total', 'cum_surp', 'sum_est'));
    }

    // detail cost per description outflow
    public function detail($out_id, $proj_id)
    {
        $project = Project::find($proj_id);
        $outflow = Outflow::where('description', $out_id)
            ->where('project_id', $proj_id)
            ->get();
        return view('cashflow.detail', compact('outflow', 'projects'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // edit inflow
    public function edit_in($id)
    {
        $inflow = Inflow::where('id', $id)->get();
        return view('cashflow.edit_in', compact('inflow'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // update inflow
    public function update(Request $request, $id)
    {
        $inflow = Inflow::find($id);
        $inflow->project_id = $request->project_id;
        $inflow->billing = $request->billing;
        $inflow->execution_date = $request->execution_date;
        $inflow->percent = $request->percent;

        $inflow->save();
        return redirect()->route('cashflow.show', ['id' => $request->project_id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // delete inflow
    public function destroy($id)
    {
        $inflow = Inflow::where('id', $id)->first();
        $inflow->delete();
        return redirect()->back();
    }

    // delete outflow
    public function destroyOut($id)
    {
        $outflow = Outflow::where('id', $id)->first();
        $outflow->delete();
        return redirect()->back();
    }
}
