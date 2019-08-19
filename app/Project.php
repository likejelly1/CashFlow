<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table ='projects';

    public function product_carts()
    {
        return $this->hasMany('App\ProductCart');
    }

    
}
