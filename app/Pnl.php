<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pnl extends Model
{
    protected $guarded = [];
    public function grossProfit($project_id)
    {
        $total_cost_sales = new CostSales();
        $total_cost_sales = $total_cost_sales->getTotal($project_id)->total_amount;
        $total_nett_sales = new NettSales();
        $total_nett_sales = $total_nett_sales->getTotal($project_id)->total_amount;
        return $total_nett_sales - $total_cost_sales;
    }

    public function nettProfit($project_id)
    {
        $commission = new Commission();
        $total_commission = (empty($commission->getTotal($project_id))) ? 0 : $commission->getTotal($project_id)->total_amount;
        return $this->grossProfit($project_id) - $total_commission;
    }
}
