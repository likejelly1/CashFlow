<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectCost;
use Illuminate\Http\Request;
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

        for ($i = 0; $i < count($projects->project_cost); $i++) {
            $rate[$i] = $projects->project_cost[$i]->rate;
            $qty[$i] = $projects->project_cost[$i]->qty;
            $freq[$i] = $projects->project_cost[$i]->freq;
            $durration[$i] = $projects->project_cost[$i]->durration;
            $total[$i] = $rate[$i] * $qty[$i] * $freq[$i] * $durration[$i];
        }
        return view('project_cost.estimation', compact('total', 'projects'));
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
        $project_cost = ProjectCost::firstOrNew(['item' => $request->item]);
        $project_cost->project_id = $request->project_id;
        $project_cost->item = $request->item;
        $project_cost->rate = $request->rate;
        $project_cost->qty = $request->qty;
        $project_cost->freq = $request->freq;
        $project_cost->durration = $request->durration;
        $success = $project_cost->save();
        return redirect()->back();
    }
    public function storeRealization(Request $request)
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

    public function editRealization($id)
    {
        //
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
