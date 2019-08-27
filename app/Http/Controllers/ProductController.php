<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $lastProduct = Product::orderBy('created_at', 'desc')->first();
        if (!$lastProduct) {
            $product_number = str_pad(0, 3, 0, STR_PAD_LEFT);
        } else {
            $product_number = str_pad($lastProduct->id, 3, 0, STR_PAD_LEFT);
        }
        $tgl = Carbon::now()->format('ym');
        // $projectname = substr($request->project_name,1,3);

        if ($request->product_code != null) {
            $product_code = $request->product_code;
        } else {
            $product_code = "PRD" . $tgl . $product_number;
        }
        
        $products = Product::firstOrNew(['code' => $product_code]);
        $products->name = $request->name;
        $products->code = $product_code;
        $products->price = str_replace(',','',$request->price);
        $products->categories_id = $request->categories;
        $success = $products->save();
        return redirect()->back();
    }
    public function load()
    {
        $products = Product::all();
        // return Response::json($products);
        return view('product.table', compact('categories', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return Response::json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        $response['status'] = "sukses";
        return redirect()->back();
        // return Response::json($response);
    }
}
