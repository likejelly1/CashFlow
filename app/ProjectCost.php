<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCost extends Model
{
    protected $fillable = ['item'];
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function realization()
    {
        return $this->hasMany('App\Tou');
    }
}
