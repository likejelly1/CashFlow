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
    public function estimated()
    {
        return $this->hasMany('App\Estimated');
    }
    public function real_commissions()
    {
        return $this->hasMany('App\RealCommission');
    }
    // public function gross_sales()
    // {
    //     return $this->hasMany('App\GrossSales');
    // }
    // public function negotiations()
    // {
    //     return $this->hasMany('App\Negotiation');

    // }
    // public function nett_saless()
    // {
    //     return $this->hasMany('App\NettSales');
    // }
    // public function cost_saless()
    // {
    //     return $this->hasMany('App\CostSales');
    // }
    // public function cost_products()
    // {
    //     return $this->hasMany('App\CostProduct');
    // }
    // public function commissions()
    // {
    //     return $this->hasMany('App\Commission');
    // }
    // public function sales_commissions()
    // {
    //     return $this->hasMany('App\SalesCommission');
    // }

    public function inflow()
    {
        return $this->hasMany('App\Inflow');
    }

    public function outflow()
    {
        return $this->hasMany('App\Outflow');
    }
}
