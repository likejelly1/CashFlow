<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outflow extends Model
{
    protected $table = 'outflow';
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
