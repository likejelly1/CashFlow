<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SalesCommission extends Model
{
    protected $guarded = [];
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function getAmountCategoryByPercent($percent, $category_id, $project_id)
    {
        $cp = CostProduct::where('category_id', $category_id)
            ->where('project_id', $project_id)
            ->first();
        $cp_amount = (empty($cp)) ? 0 : $cp->amount;
        $ns = NettSales::where('category_id', $category_id)
            ->where('project_id', $project_id)
            ->first();
        $ns_amount = (empty($ns)) ? 0 : $ns->amount;
        return ($ns_amount - $cp_amount) * $percent / 100;
    }
    public function getTotal($project_id)
    {
        return DB::table('sales_commissions')
            ->select(DB::raw('sum(amount) as total_amount'))
            ->groupBy('project_id')
            ->where('project_id', $project_id)
            ->first();
    }

    public function storeCommission($project_id)
    {
        $cm = Commission::firstOrNew(['item' => 'Sales Commission', 'project_id' => $project_id]);
        $cm->amount = $cm->getTotalSalesCommissionByPercent(100, $project_id);
        $cm->percent = 100;
        return $cm->save();
    }
}
