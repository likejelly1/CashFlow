<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function project_cost(Type $var = null)
    {
        return $this->hasMany('App\ProjectCost');
    }
}
