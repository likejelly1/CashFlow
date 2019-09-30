<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Negotiation extends Model
{
    protected $guarded = [];
    public function getTotal($project_id)
    {
        return DB::table('negotiations')
            ->select(DB::raw('sum(amount) as total_amount'))
            ->groupBy('project_id')
            ->where('project_id', $project_id)
            ->first();
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
