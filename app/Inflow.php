<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Inflow extends Model
{
    protected $table = 'inflow';
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
    public function outflow()
    {
        return $this->hasMany('App\Outflow');
    }
    
}

