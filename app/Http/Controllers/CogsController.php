<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductCart;
use App\Project;
use App\Category;
use App\Customer;
use App\Role;
use Auth;
use Carbon\Carbon;
use PDF;
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
        $product_carts = DB::table('product_carts')
            ->join('products', 'product_carts.product_id', 'products.id')
            ->select('product_carts.qty as qty', 'product_carts.id as id', 'product_carts.price_list_satuan as price_list_satuan', 'product_carts.price_list_total as price_list_total', 'product_carts.discount_pl as discount_pl', 'product_carts.grossup_pl as grossup_pl', 'product_carts.harga_satuan_modal as harga_satuan_modal', 'product_carts.harga_total_modal as harga_total_modal', 'product_carts.discount_jual as discount_jual', 'product_carts.grossup_jual as grossup_jual', 'product_carts.harga_satuan_jual as harga_satuan_jual', 'product_carts.harga_total_jual as harga_total_jual', 'product_carts.satuan as satuan', 'products.name as name')
            ->where('product_carts.project_id', $proj_id)
            ->where('products.categories_id', $cat_id)
            ->get();
        // return $product_carts;
        return view('cogs.cart', compact('product_carts'));
        // return $product_cart;
    }
    public function getAllProduct($id)
    {
        $product_carts = DB::table('product_carts')
            ->select('product_carts.id as id', 'product_carts.qty as qty', 'product_carts.price_list_satuan as price_list_satuan', 'product_carts.price_list_total as price_list_total', 'product_carts.discount_pl as discount_pl', 'product_carts.grossup_pl as grossup_pl', 'product_carts.harga_satuan_modal as harga_satuan_modal', 'product_carts.harga_total_modal as harga_total_modal', 'product_carts.discount_jual as discount_jual', 'product_carts.grossup_jual as grossup_jual', 'product_carts.harga_satuan_jual as harga_satuan_jual', 'product_carts.harga_total_jual as harga_total_jual', 'product_carts.satuan as satuan', 'products.name as name')
            ->join('products', 'product_carts.product_id', 'products.id')
            ->where('product_carts.project_id', $id)
            ->get();
        return view('cogs.cart', compact('product_carts'));
    }
    public function show($id)
    {
        $project = Project::find($id);
        $product = Product::orderBy('categories_id')->get();
        $category = Category::all();
        for ($i = 0; $i < count($category); $i++) {
            $total_harga_jual[$i] = $this->getTotalJual($i + 1, $id);
            $total_harga_modal[$i] = $this->getTotalModal($i + 1, $id);
        }
        $product_carts = DB::table('product_carts')
            ->select('product_carts.id as id', 'product_carts.qty as qty', 'product_carts.price_list_satuan as price_list_satuan', 'product_carts.price_list_total as price_list_total', 'product_carts.discount_pl as discount_pl', 'product_carts.grossup_pl as grossup_pl', 'product_carts.harga_satuan_modal as harga_satuan_modal', 'product_carts.harga_total_modal as harga_total_modal', 'product_carts.discount_jual as discount_jual', 'product_carts.grossup_jual as grossup_jual', 'product_carts.harga_satuan_jual as harga_satuan_jual', 'product_carts.harga_total_jual as harga_total_jual', 'product_carts.satuan as satuan', 'products.name as name')
            ->join('products', 'product_carts.product_id', 'products.id')
            ->where('product_carts.project_id', $id)
            ->get();
        return view('cogs.pages', compact('project', 'product', 'category', 'product_carts', 'total_harga_jual', 'total_harga_modal'));
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
            $booking_number = str_pad(0, 4, 0, STR_PAD_LEFT);
        } else {
            $booking_number = str_pad($lastBooking->id, 4, 0, STR_PAD_LEFT);
        }
        $replace_item = array('PT', ' ', '.', 'pt');
        $customer_name = strtolower(str_replace($replace_item,'', Customer::find($request->customer_id)->institution_name));
        $project_code = $customer_name . $booking_number;

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
        $lastBooking = ProductCart::orderBy('created_at', 'desc')->first();
        if (!$lastBooking) {
            $booking_number = str_pad(0, 5, 0, STR_PAD_LEFT);
        } else {
            $booking_number = str_pad($lastBooking->id, 5, 0, STR_PAD_LEFT);
        }
        $tgl = Carbon::now()->format('ym');
        if ($request->code == null) {
            $code = "PC" . $tgl . $booking_number;
        } else {
            $code = $request->code;
        }

        $product = Product::find($request->product_id);
        $price_list_satuan = $product->price;
        $price_list_total = $price_list_satuan * $request->qty;
        if ($request->pl_disc == null) {
            $pl_disc = 0;
        } else {
            $pl_disc = $request->pl_disc / 100;
        }
        if ($request->pl_gross == null) {
            $pl_gross = 0;
        } else {
            $pl_gross = $request->pl_gross / 100;
        }
        if ($request->jual_disc == null) {
            $jual_disc = 0;
        } else {
            $jual_disc = $request->jual_disc / 100;
        }
        if ($request->jual_gross == null) {
            $jual_gross = 0;
        } else {
            $jual_gross = $request->jual_gross / 100;
        }

        if ($pl_disc == 0) {
            $harga_satuan_modal = $price_list_satuan * (1 + $pl_gross);
        } else {
            $harga_satuan_modal = $price_list_satuan * (1 - $pl_disc);
        }
        $harga_total_modal = $harga_satuan_modal * $request->qty;
        if ($jual_disc == 0) {
            $harga_satuan_jual = $price_list_satuan * (1 + $jual_gross);
        } else {
            $harga_satuan_jual = $price_list_satuan * (1 - $jual_disc);
        }
        $harga_total_jual = $harga_satuan_jual * $request->qty;
        $procart = ProductCart::firstOrNew(['code' => $code]);
        $procart->project_id = $request->project_id;
        $procart->product_id = $request->product_id;
        $procart->qty = $request->qty;
        $procart->discount_pl = (empty($request->pl_disc)) ? 0 : $request->pl_disc;
        $procart->grossup_pl = (empty($request->pl_gross)) ? 0 : $request->pl_gross;
        $procart->discount_jual = (empty($request->jual_disc)) ? 0 : $request->jual_disc;
        $procart->grossup_jual = (empty($request->jual_gross)) ? 0 : $request->jual_gross;
        $procart->price_list_satuan = $price_list_satuan;
        $procart->price_list_total = $price_list_total;
        $procart->harga_satuan_modal = $harga_satuan_modal;
        $procart->harga_total_modal = $harga_total_modal;
        $procart->harga_satuan_jual = $harga_satuan_jual;
        $procart->satuan = $request->satuan;
        $procart->harga_total_jual = $harga_total_jual;
        $procart->save();
        $product = Product::find($request->product_id);
        $procart->storeGrossSales($product->categories_id, $request->project_id);
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

    public function edit($id)
    {
        $pro = ProductCart::find($id);

        return $pro;
    }

    public function getTotalModal($cat_id, $proj_id)
    {
        $product_carts = DB::table('product_carts')
            ->select('product_carts.id as id', 'product_carts.qty as qty', 'product_carts.price_list_satuan as price_list_satuan', 'product_carts.price_list_total as price_list_total', 'product_carts.discount_pl as discount_pl', 'product_carts.grossup_pl as grossup_pl', 'product_carts.harga_satuan_modal as harga_satuan_modal', 'product_carts.harga_total_modal as harga_total_modal', 'product_carts.discount_jual as discount_jual', 'product_carts.grossup_jual as grossup_jual', 'product_carts.harga_satuan_jual as harga_satuan_jual', 'product_carts.harga_total_jual as harga_total_jual', 'product_carts.satuan as satuan', 'products.name as name')
            ->join('products', 'product_carts.product_id', 'products.id')
            ->where('product_carts.project_id', $proj_id)
            ->where('products.categories_id', $cat_id)
            ->get();

        if (!empty($product_carts)) {
            for ($i = 0; $i < count($product_carts); $i++) {
                $subtotal[$i] = $product_carts[$i]->harga_total_modal * (1 + (0.1));
            }
            if (!empty($subtotal)) {
                $total = array_sum($subtotal);
            } else {
                $total = 0;
            }
        } else {
            $total = 0;
        }
        return $total;
    }
    public function getTotalJual($cat_id, $proj_id)
    {
        $product_carts = DB::table('product_carts')
            ->select('product_carts.id as id', 'product_carts.qty as qty', 'product_carts.price_list_satuan as price_list_satuan', 'product_carts.price_list_total as price_list_total', 'product_carts.discount_pl as discount_pl', 'product_carts.grossup_pl as grossup_pl', 'product_carts.harga_satuan_modal as harga_satuan_modal', 'product_carts.harga_total_modal as harga_total_modal', 'product_carts.discount_jual as discount_jual', 'product_carts.grossup_jual as grossup_jual', 'product_carts.harga_satuan_jual as harga_satuan_jual', 'product_carts.harga_total_jual as harga_total_jual', 'product_carts.satuan as satuan', 'products.name as name')
            ->join('products', 'product_carts.product_id', 'products.id')
            ->where('product_carts.project_id', $proj_id)
            ->where('products.categories_id', $cat_id)
            ->get();

        if (!empty($product_carts)) {
            for ($i = 0; $i < count($product_carts); $i++) {
                $subtotal[$i] = $product_carts[$i]->harga_total_jual * (1 + (0.1));
            }
            if (!empty($subtotal)) {
                $total = array_sum($subtotal);
            } else {
                $total = 0;
            }
        } else {
            $total = 0;
        }
        return $total;
    }
    public function cetak_pdf($id){
        $project = Project::find($id);
        $product = Product::orderBy('categories_id')->get();
        $category = Category::all();
        $user = Auth::user($id);

        for ($i = 0; $i < count($category); $i++) {
            $total_harga_jual[$i] = $this->getTotalJual($i + 1, $id);
            $total_harga_modal[$i] = $this->getTotalModal($i + 1, $id);
        }
        $product_carts = DB::table('product_carts')
            ->select('product_carts.id as id', 'product_carts.qty as qty', 'product_carts.price_list_satuan as price_list_satuan', 'product_carts.price_list_total as price_list_total', 'product_carts.discount_pl as discount_pl', 'product_carts.grossup_pl as grossup_pl', 'product_carts.harga_satuan_modal as harga_satuan_modal', 'product_carts.harga_total_modal as harga_total_modal', 'product_carts.discount_jual as discount_jual', 'product_carts.grossup_jual as grossup_jual', 'product_carts.harga_satuan_jual as harga_satuan_jual', 'product_carts.harga_total_jual as harga_total_jual', 'product_carts.satuan as satuan', 'products.name as name')
            ->join('products', 'product_carts.product_id', 'products.id')
            ->where('product_carts.project_id', $id)
            ->get();
            
        $pdf = PDF::loadview('cogs.cogs_pdf', compact('project','product_carts', 'product','category', 'total_harga_jual', 'total_harga_modal','user'))->setPaper('a4', 'landscape');
        return $pdf->stream();

        // return view('cogs.cogs_pdf', compact('project', 'product', 'category', 'product_carts', 'total_harga_jual', 'total_harga_modal'));
    }
    public function destroy($id)
    {
        $projects = Project::where('id', $id)->first();
        $projects->delete();
        return redirect()->back();
    }
}
