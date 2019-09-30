<?php

namespace App\Http\Controllers;

use App\Category;
use App\Commission;
use App\CostProduct;
use App\CostSales;
use App\GrossSales;
use App\Negotiation;
use App\NettSales;
use App\Pnl;
use App\Project;
use App\SalesCommission;
use Illuminate\Http\Request;

class PnlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();
        return view('pnl.index', compact('project'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $ppn = 10 / 100;
        $project = Project::find($id);
        $gross_sales = GrossSales::where('project_id', $id)->orderBy('category_id')->get();
        $total_gross_sales = new GrossSales();
        $total_gross_sales = $total_gross_sales->getTotal($id)->total_amount;
        $negotiations = Negotiation::where('project_id', $id)->orderBy('category_id')->get();
        $total_negotiation = new Negotiation();
        $total_negotiation = (empty($total_negotiation->getTotal($id))) ? 0 : $total_negotiation->getTotal($id)->total_amount;

        $nett_sales = NettSales::where('project_id', $id)->orderBy('category_id')->get();
        $total_nett_sales = new NettSales();
        $total_nett_sales = $total_nett_sales->getTotal($id)->total_amount;
        $cost_sales = CostSales::where('project_id', $id)->get();
        $total_cost_sales = new CostSales();
        $total_cost_sales = (empty($total_cost_sales->getTotal($id))) ? 0 : $total_cost_sales->getTotal($id)->total_amount;
        $cost_products = CostProduct::where('project_id', $id)->orderBy('category_id')->get();
        $total_cost_products = new CostProduct();
        $total_cost_products = $total_cost_products->getTotal($id)->total_amount;
        $gross_profit = new Pnl();
        $gross_profit = $gross_profit->grossProfit($id);
        $nett_profit = new Pnl();
        $nett_profit = $nett_profit->nettProfit($id);
        $contract_price = $total_nett_sales * (1 + $ppn);
        $commissions = Commission::where('project_id', $id)->get();
        $total_commissions = new Commission();
        $total_commissions = (empty($total_commissions->getTotal($id))) ? 0 : $total_commissions->getTotal($id)->total_amount;
        $sales_commission = SalesCommission::where('project_id', $id)->orderBy('category_id')->get();
        $total_sales_commission = new SalesCommission();
        $total_sales_commission = (empty($total_sales_commission->getTotal($id))) ? 0 : $total_sales_commission->getTotal($id)->total_amount;






        return view('pnl.show', compact('categories', 'contract_price', 'project', 'gross_sales', 'total_gross_sales', 'negotiations', 'total_negotiation', 'nett_sales', 'total_nett_sales', 'cost_sales', 'total_cost_sales', 'cost_products', 'total_cost_products', 'nett_profit', 'gross_profit', 'commissions', 'total_commissions', 'sales_commission', 'total_sales_commission'));
    }

    public function storeNegotiation(Request $request)
    {
        $gs = GrossSales::firstOrNew(['category_id' => $request->category_id, 'project_id' => $request->project_id]);
        $negotiation = Negotiation::firstOrNew(['category_id' => $request->category_id, 'project_id' => $request->project_id]);
        $negotiation->percent = $request->percent;
        $negotiation->amount = $request->percent / 100 * $gs->amount;
        $negotiation->save();
        $nett_sales = NettSales::firstOrNew(['category_id' => $request->category_id, 'project_id' => $request->project_id]);
        $nett_sales->amount = $gs->amount - ($request->percent * $gs->amount);
        $nett_sales->save();
        if ($$request->category_id == 4 || $$request->category_id == 5 || $$request->category_id == 6) {
            $nett_sales->storeSalesCommission($request->category_id, $request->project_id);
        }
        return redirect()->back();
    }

    public function storeCostSales(Request $request)
    {
        $total_nett_sales = new NettSales();
        $total_nett_sales = $total_nett_sales->getTotal($request->project_id)->total_amount;

        if ($request->item != 'Entertainment') {
            $percent = str_replace(',','',$request->amount) / $total_nett_sales * 100;
            $amount = str_replace(',','',$request->amount);
        } else {
            $amount = $request->percent / 100 * $total_nett_sales;
            $percent = $request->percent;
        }

        $cs = CostSales::firstOrNew(['item' => $request->item, 'project_id' => $request->project_id]);
        $cs->amount = $amount;
        $cs->percent = $percent;
        $cs->save();
        $c = Commission::firstOrNew(['item' => 'Sales Commission', 'project_id' => $request->project_id]);
        $c->getTotalSalesComissionByPercent(100, $request->project_id);
        $c->percent = 100;
        $c->save();
        return redirect()->back(); 
    }

    public function storeCommission(Request $request)
    {
        $cm = Commission::firstOrNew(['item' => $request->item, 'project_id' => $request->project_id]);
        if ($request->item == 'Technical Commission') {
            $amount = $cm->countTechnicalCommission($request->percent, $request->project_id);
            $percent = $request->percent;
        } elseif ($request->item == 'Admin and Finance Team Commission') {
            $amount = str_replace(',','',$request->amount);
            $percent = $cm->getPercentAdmin(str_replace(',','',$request->amount), $request->project_id);
        } elseif ($request->item = 'Sales Commission') {
            $amount = $cm->getTotalSalesCommissionByPercent($request->percent, $request->project_id);
            $percent = $request->percent;
        }
        $cm->amount = $amount;
        $cm->percent = $percent;
        $cm->save();
        return redirect()->back();
    }
    
    public function storeSalesCommission(Request $request)
    {
        $sc = SalesCommission::firstOrNew(['category_id' => $request->category_id, 'project_id' => $request->project_id]);

        $sc->amount = $sc->getAmountCategoryByPercent($request->percent, $request->category_id, $request->project_id);
        $sc->percent = $request->percent;
        $sc->storeCommission($request->project_id);
        $sc->save();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editNegotiation($id)
    {
        return Negotiation::find($id);
    }

    public function editCostSales($id)
    {
        return CostSales::find($id);
    }
    public function editCommission($id)
    {
        return Commission::find($id);
    }
    public function editSalesCommission($id)
    {
        return SalesCommission::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
