<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCost extends Model
{
    public function project()
    {
       return $this->belongsTo('App\Project');
    }
}
