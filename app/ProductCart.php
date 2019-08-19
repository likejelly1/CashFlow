<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    protected $table = 'product_carts';

    public function project()
    {
        return $this->belongsTo('App\Project');

    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }


}
