<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
use DB;

class NettSales extends Model
{
    protected $guarded = [];
    public function getTotal($project_id)
    {
        return DB::table('nett_sales')
            ->select(DB::raw('sum(amount) as total_amount'))
            ->groupBy('project_id')
            ->where('project_id', $project_id)
            ->first();
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function storeSalesCommission($category_id, $project_id)
    {
        $sc = SalesCommission::firstOrNew(['category_id' => $category_id, 'project_id' => $project_id]);
        $sc->amount = $sc->getAmountCategoryByPercent(100, $category_id, $project_id);
        $sc->percent = 100;
        $sc->storeCommission($project_id);
        $sc->save();
    }
}
