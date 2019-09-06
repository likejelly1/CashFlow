<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inflow extends Model
{
    protected $table = 'inflow';
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}
