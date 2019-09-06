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
use DB;

class CogsController extends Controller
{
    public function index()
    {
        $project = Project::all();

        return view('cogs.index2', compact('project'));
    }
    public function getData($proj_id, $cat_id)
    {
        $products = Product::where('categories_id', $cat_id)->get();
        $project = Project::find($proj_id);
        $product_cart = DB::table('product_carts');
        return $project->product_carts()->whereIn('product_id', $products->id)->get();
    }
    public function show($id)
    {
        $project = Project::find($id);
        $product = Product::all();
        $category = Category::all();
        $product_carts = $project->product_carts;
        // echo $product_carts;
        return view('cogs.pages', compact('project', 'product', 'category', 'product_carts'));
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
        $projectname = strtoupper(substr($request->name, 0, 3));

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

    public function storeCustomer(Request $request)
    {
        $data = new Customer();
        $data->institution_name = $request->institution_name;
        $data->person_name = $request->person_name;
        $data->position = $request->position;
        $data->department = $request->department;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;

        $data->save();
        // return redirect()->route('cogs.create');
        return redirect()->back()->with('message', 'Berhasil menambahkan data customer!');
    }
}
