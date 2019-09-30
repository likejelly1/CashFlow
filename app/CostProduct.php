<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class CostProduct extends Model
{
    protected $guarded = [];
    public function getTotal($project_id)
    {
        return DB::table('cost_products')
            ->select(DB::raw('sum(amount) as total_amount'))
            ->groupBy('project_id')
            ->where('project_id', $project_id)
            ->first();
    }
    public function storeCostSales($project_id)
    {
        $cs = CostSales::firstOrNew(['item'=> 'Cost Product', 'project_id'=>$project_id]);
        $cs->amount = $this->getTotal($project_id)->total_amount;
        $cs->save();
        $c = Commission::firstOrNew(['item'=>'Sales Commission', 'project_id'=>$project_id]);
        $c->getTotalSalesComissionByPercent(100, $project_id);
        $c->percent = 100;
        return $c->save();
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
