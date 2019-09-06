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
    public function project_cost()
    {
        return $this->hasMany('App\ProjectCost');
    }

    public function product_carts()
    {
        return $this->hasMany('App\ProductCart');
    }

    public function inflow()
    {
        return $this->hasMany('App\Inflow');
    }

    public function outflow()
    {
        return $this->hasMany('App\Outflow');
    }
}
