<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class CostSales extends Model
{
  protected $guarded = [];
  public function getTotal($project_id)
  {
    return DB::table('cost_sales')
      ->select(DB::raw('SUM(amount) AS total_amount'))
      ->groupBy('project_id')
      ->where('project_id', $project_id)
      ->first();
  }
  public function getPercentByAmount($amount, $project_id)
  {
    $total_nett_sales = NettSales::getTotal($project_id);
    return $total_nett_sales->total_amount / $amount;
  }

  public function getAmountByPercent($percent, $project_id)
  {
    $total_nett_sales = NettSales::getTotal($project_id);
    return $total_nett_sales->total_amount * $percent / 100;
  }
}
