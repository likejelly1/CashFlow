<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimated extends Model
{
    protected $table = 'estimated';
    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}
