<?php

namespace App\Http\Controllers;

use App\Inflow;
use App\Project;
use App\Outflow;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Response;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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



    public function store(Request $request)
    {

        $inflow = new Inflow();
        $inflow->project_id = $request->project_id;
        $inflow->billing = $request->billing;
        $inflow->execution_date = $request->execution_date;
        $inflow->percent = $request->percent;
        $inflow->net_sales = 300000;

        $inflow->save();
        return redirect()->back();
    }

    public function storeOut(Request $request)
    {
        $outflow = new Outflow();
        $outflow->project_id = $request->project_id;
        $outflow->description = $request->description;
        $outflow->execution_date = $request->execution_date;
        $outflow->cost = str_replace(',', '', $request->cost);
        $outflow->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $projects = Project::find($id);
        // return $projects;
        if (!empty($projects->inflow)) {
            for ($i = 0; $i < count($projects->inflow); $i++) {
                $percent[$i] = $projects->inflow[$i]->percent;
                $net_sales[$i] = $projects->inflow[$i]->net_sales;
                $sub_total[$i] = $percent[$i] * $net_sales[$i] / 100;
            }
            if (!empty($sub_total)) {
                $total = array_sum($sub_total);
            } else {
                $total = 0;
            }
        } else {
            $total = 0;
        }
        $inflow = Inflow::where('project_id', $id)->get();
        return view('cashflow.inflow', compact('inflow', 'projects', 'total'));
    }

    public function showOutflow($id)
    {
        $projects = Project::find($id);
        $outflow = Outflow::where('project_id', $id)->get();
        $dates = Outflow::select('id', 'execution_date')
            ->get()
            ->groupBy(function ($date) {
                // return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
        return view('cashflow.outflow', compact('outflow', 'projects', 'dates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_in($id)
    {

        $inflow = Inflow::where('id', $id)->get();
        return view('cashflow.edit_in', compact('inflow'));
    }

    public function edit_out($id)
    {

        $outflow = Outflow::where('id', $id)->get();
        return view('cashflow.edit_out', compact('outflow'));
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
        $inflow = Inflow::find($id);
        $inflow->project_id = $request->project_id;
        $inflow->billing = $request->billing;
        $inflow->execution_date = $request->execution_date;
        $inflow->percent = $request->percent;

        $inflow->save();
        return redirect()->route('cashflow.show', ['id' => $request->project_id]);
    }

    public function updateOut(Request $request, $id)
    {
        $outflow = Outflow::find($id);
        $outflow->project_id = $request->project_id;
        $outflow->description = $request->description;
        $outflow->execution_date = $request->execution_date;
        $outflow->cost = $request->cost;

        $outflow->save();
        return redirect()->route('cashflow.showOutflow', ['id' => $request->project_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inflow = Inflow::where('id', $id)->first();
        $inflow->delete();
        return redirect()->back();
    }

    public function destroyOut($id)
    {
        $outflow = Outflow::where('id', $id)->first();
        $outflow->delete();
        return redirect()->back();
    }
}
