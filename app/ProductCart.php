<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ProductCart extends Model
{
    protected $fillable = ['code'];
    protected $guarded = [];
    //
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function getSumModalCategoriesByProjectId($categories_id, $project_id)
    {
        return DB::table('product_carts')
            ->select(DB::raw('sum(product_carts.harga_total_modal) as total_modal'))
            ->join('products', 'product_carts.product_id', '=', 'products.id')
            ->groupBy('products.categories_id')
            ->where('products.categories_id', $categories_id)
            ->where('product_carts.project_id', $project_id)
            ->first();
    }
    public function getSumJualCategoriesByProjectId($categories_id, $project_id)
    {
        return DB::table('product_carts')
            ->select(DB::raw('sum(product_carts.harga_total_jual) as total_jual'))
            ->join('products', 'product_carts.product_id', '=', 'products.id')
            ->groupBy('products.categories_id')
            ->where('products.categories_id', $categories_id)
            ->where('product_carts.project_id', $project_id)
            ->first();
    }
    public function storeGrossSales($category_id, $project_id)
    {
        $gs = GrossSales::firstOrNew(['category_id' => $category_id, 'project_id' => $project_id]);
        $gs->amount = $this->getSumJualCategoriesByProjectId($category_id, $project_id)->total_jual;
        $gs->save();
        $ns = NettSales::firstOrNew(['category_id' => $category_id, 'project_id' => $project_id]);
        $ns->amount = $this->getSumJualCategoriesByProjectId($category_id, $project_id)->total_jual;
        $ns->save();

        $this->storeCostProduct($category_id, $project_id);

        if ($category_id == 4 || $category_id == 5 || $category_id == 6) {
            $this->storeSalesCommission($category_id, $project_id);
        }

        return $this->storeNegotiation($category_id, $project_id);
    }
    public function storeCostProduct($category_id, $project_id)
    {
        $cp = CostProduct::firstOrNew(['category_id' => $category_id, 'project_id' => $project_id]);
        $cp->amount = $this->getSumModalCategoriesByProjectId($category_id, $project_id)->total_modal;
        $cp->save();
        return $cp->storeCostSales($project_id);
    }

    public function storeSalesCommission($category_id, $project_id)
    {
        $sc = SalesCommission::firstOrNew(['category_id' => $category_id, 'project_id' => $project_id]);
        $sc->amount = $sc->getAmountCategoryByPercent(100, $category_id, $project_id);
        $sc->percent = 100;
        $sc->storeCommission($project_id);
        $sc->save();
    }
    public function storeNegotiation($category_id, $project_id)
    {
        $n = Negotiation::firstOrNew(['category_id' => $category_id, 'project_id' => $project_id]);
        $n->amount = 0;
        $n->percent = 0;
        $n->save();
    }
}
