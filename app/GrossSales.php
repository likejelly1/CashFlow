<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class GrossSales extends Model
{
    protected $guarded = [];
    public function getTotal($project_id)
    {
        return DB::table('gross_sales')
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
