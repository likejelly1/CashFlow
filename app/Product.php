<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['code'];

    public function categories()
    {
        $this->belongsTo('App\Category');
    }
    public function product_carts()
    {
        return $this->hasMany('App\ProductCart');
    }
}
