<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealCommission extends Model
{
    protected $table = 'real_commissions';
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}
