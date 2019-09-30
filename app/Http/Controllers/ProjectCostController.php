<?php

namespace App\Http\Controllers;

use App\Outflow;
use App\Project;
use App\ProjectCost;
use App\Tou;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;

class ProjectCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        // return $projects[0]->customer;
        return view('project_cost.index', compact('projects'));
    }

    public function estimation($id)
    {
        $projects = Project::find($id);
        if (!empty($projects->project_cost)) {
            for ($i = 0; $i < count($projects->project_cost); $i++) {
                $rate[$i] = $projects->project_cost[$i]->rate;
                $qty[$i] = $projects->project_cost[$i]->qty;
                $freq[$i] = $projects->project_cost[$i]->freq;
                $durration[$i] = $projects->project_cost[$i]->durration;
                $subtotal[$i] = $rate[$i] * $qty[$i] * $freq[$i] * $durration[$i];
            }
            if (!empty($subtotal)) {
                $total = array_sum($subtotal);
            } else {
                $total = 0;
            }
        } else {
            $total = 0;
        }
        return view('project_cost.estimation', compact('total', 'projects'));
    }
    public function realization($id)
    {
        // echo $id;
        $project_cost = ProjectCost::find($id);
        $realization = $project_cost->realization;
        for ($i = 0; $i < count($realization); $i++) {
            $cost[$i] = $realization[$i]->cost;
        }
        if (!empty($cost)) {
            $totalcost = array_sum($cost);
        } else {
            $totalcost = 0;
        }
        // return $realization;
        // return $project_cost;
        return view('project_cost.realization', compact('realization', 'totalcost'));
    }

    // public function list()
    // {
    //     return view('project_cost.pc_list');
    // }

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
    public function storeEstimation(Request $request)
    {
        $lastPc = ProjectCost::orderBy('created_at', 'desc')->first();
        if (!$lastPc) {
            $Pc_number = str_pad(0, 3, 0, STR_PAD_LEFT);
        } else {
            $Pc_number = str_pad($lastPc->id, 3, 0, STR_PAD_LEFT);
        }
        $tgl = Carbon::now()->format('ym');
        // $projectname = substr($request->project_name,1,3);

        if ($request->code != null) {
            $Pc_code = $request->code;
        } else {
            $Pc_code = "EST" . $tgl . $Pc_number;
        }
        // 
        // 
        $project_cost = ProjectCost::firstOrNew(['code' => $Pc_code]);
        $project_cost->project_id = $request->project_id;
        $project_cost->code = $Pc_code;
        $project_cost->item = $request->item;
        $project_cost->rate = str_replace(',', '', $request->rate);
        $project_cost->qty = $request->qty;
        $project_cost->freq = $request->freq;
        $project_cost->durration = $request->durration;
        $success = $project_cost->save();
        return redirect()->back();
    }
    public function storeRealization(Request $request)
    {
        $realization = new Tou();
        $realization->project_cost_id = $request->project_cost_id;
        $realization->execution_date = $request->execution_date;
        $realization->cost = str_replace(',', '', $request->cost);
        $realization->save();

        $tou = Tou::where('project_cost_id', $request->project_cost_id)->first();

        $co = new Outflow();
        $co->project_id = $tou->project_cost->project_id;
        $co->description = 'Project Cost';
        $co->execution_date = $request->execution_date;
        $co->cost = str_replace(',', '', $request->cost);
        $co->save();


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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEstimation($id)
    {
        $project_cost = ProjectCost::find($id);
        return Response::json($project_cost);
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
    public function destroyEstimation($id)
    {
        ProjectCost::destroy($id);
        return redirect()->back();
    }
    public function destroyRealization($id)
    {
        Tou::destroy($id);
        return redirect()->back();
    }
}
