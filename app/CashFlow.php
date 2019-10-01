<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    public function countSurplusPerMonth($project_id)
    {
        $co = Outflow::getTotalPerMonth($project_id);
        foreach ($co as $co ) {
        }
        $ci = Inflow::getTotalPerMonth($project_id);

        return $ci - $co;
    }
}
