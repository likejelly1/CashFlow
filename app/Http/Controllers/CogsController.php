<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCart;
use App\Project;
use App\Category;
use App\Customer;
use Auth;
use Carbon\Carbon;

class CogsController extends Controller
{
    public function index()
    {
        $project = Project::all();

        return view('cogs.index2', compact('project'));
    }
    public function getData($id)
    {
        $categories = Category::find($id);
        // return $categories->product;
        $p = $categories->product;
        // for ($i = 0; $i < count($p); $i++) {
        //     $pc[$i] = $p[$i]->product_carts;
        // }
        return $p;
        // $product_cart = $categories->product->product_carts;
        // return $product_cart;
        // return view('cogs.cart', compact('product_carts'));
    }
    public function show($id)
    {
        $project = Project::find($id);
        $product = Product::all();
        $category = Category::all();
        return view('cogs.pages', compact('project', 'product', 'category'));
    }

    public function addNew()
    {
        $c = Customer::all();
        $user = Auth::user();
        return view('cogs.create', compact('user', 'c'));
    }

    public function store(Request $request)
    {
        $lastBooking = Project::orderBy('created_at', 'desc')->first();
        if (!$lastBooking) {
            $booking_number = str_pad(0, 5, 0, STR_PAD_LEFT);
        } else {
            $booking_number = str_pad($lastBooking->id - 1, 5, 0, STR_PAD_LEFT);
        }
        $tgl = Carbon::now()->format('ym');
        $projectname = substr($request->project_name, 1, 3);

        $project_code = $projectname . $tgl . $booking_number;

        $data = new Project();
        $data->code = $project_code;
        $data->name = $request->name;
        $data->customer_id = $request->customer_id;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect()->route('cogs.project');
    }

    public function storeProcart(Request $request)
    {

        $procart = new ProductCart;
        $procart->project_id = $request->project_id;
        $procart->product_id = $request->product_id;
        $procart->qty = $request->qty;
        $procart->save();

        return redirect()->route('cogs.show', ['id' => $request->project_id]);
    }
}
