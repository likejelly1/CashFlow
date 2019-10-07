<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class ProjectCost extends Model
{
    protected $fillable = ['item'];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function realization()
    {
        return $this->hasMany('App\Tou');
    }

    public function getTotal($project_id)
    {
        return DB::table('project_costs')
            ->select(DB::raw('sum(rate) as total_amount'))
            ->groupBy('project_id')
            ->where('project_id', $project_id)
            ->first();
    }
    public function storeCostSales($project_id)
    {
        $cs = CostSales::firstOrNew(['item' => 'Cost Product', 'project_id' => $project_id]);
        $cs->amount = $this->getTotal($project_id)->total_amount;
        $cs->save();
        $c = Commission::firstOrNew(['item' => 'Sales Commission', 'project_id' => $project_id]);
        $c->amount = $c->getTotalSalesCommissionByPercent(100, $project_id);
        $c->percent = 100;
        return $c->save();
    }
}
