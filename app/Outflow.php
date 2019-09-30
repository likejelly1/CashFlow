<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Outflow extends Model
{
    protected $table = 'outflow';
    protected $dates = ['execution_date'];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function inflow()
    {
        return $this->belongsTo('App\Inflow', 'in_id');
    }
   
}
