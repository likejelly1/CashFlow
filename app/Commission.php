<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $guarded = [];
    public function getTotal($project_id)
    {
        return DB::table('commissions')
            ->select(DB::raw('sum(amount) as total_amount'))
            ->groupBy('project_id')
            ->where('project_id', $project_id)
            ->first();
    }

    public function getTotalSalesCommissionByPercent($percent, $project_id)
    {
        $scm = SalesCommission::where('project_id', $project_id)
            ->where('category_id', 6)
            ->first();
        if ($scm == null) {
            $scm_amount = 0;
        } else {
            $scm_amount = $scm->amount;
        }
        $scp = SalesCommission::where('project_id', $project_id)
            ->where('categorY_id', 5)
            ->first();
        if ($scp == null) {
            $scp_amount = 0;
        } else {
            $scp_amount = $scp->amount;
        }
        $scs = SalesCommission::where('project_id', $project_id)
            ->where('category_id', 4)
            ->first();
        if ($scs == null) {
            $scs_amount = 0;
        } else {
            $scs_amount = $scs->amount;
        }
        $gp = new Pnl();
        $gp = $gp->grossProfit($project_id);

        return ($gp * $percent / 100) + ($scm_amount + $scp_amount + $scs_amount);
    }
    public function countTechnicalCommission($percent, $project_id)
    {
        $cpps = CostProduct::where('category_id', 5)
            ->where('project_id', $project_id)
            ->first();
        $cpps_amount = (empty($cpps->amount)) ? 0 : $cpps->amount;
        $nsps = NettSales::where('category_id', 5)
            ->where('project_id', $project_id)
            ->first();
        $nsps_amount = (empty($nsps->amount)) ? 0 : $nsps->amount;

        $cpms = CostProduct::where('category_id', 6)
            ->where('project_id', $project_id)
            ->first();
        $cpms_amount = (empty($cpms->amount)) ? 0 : $cpms->amount;

        $nsms = NettSales::where('category_id', 6)
            ->where('project_id', $project_id)
            ->first();
        $nsms_amount = (empty($nsms->amount)) ? 0 : $nsms->amount;

        $pc = new ProjectCost();
        $pc = (empty($pc->getTotal($project_id))) ? 0 : $pc->getTotal($project_id)->total_amount;


        return ($nsms_amount + $nsps_amount - $cpms_amount - $cpps_amount - $pc) * $percent / 100;
    }
    public function getPercentAdmin($amount, $project_id)
    {
        $nettsales = new NettSales();
        $total_nett_sales = $nettsales->getTotal($project_id)->total_amount;

        return ($amount / $total_nett_sales * 100);
    }
}
