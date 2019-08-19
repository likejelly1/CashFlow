<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tou extends Model
{
    public function project_cost()
    {
        return $this->belongsTo('App\ProjectCost');
    }
}
