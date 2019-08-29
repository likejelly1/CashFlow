<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['code'];

    public function categories()
    {
        $this->belongsTo('App\Category', 'categories_id');
    }
    public function product_carts()
    {
        return $this->belongsTo('App\ProductCart', 'product_id');
    }
}
