<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CogsController extends Controller
{
    public function index(){
        return view('cogs.index2');
    }

    public function page(){
        
        return view('cogs.pages');
    }

    public function addNew(){
        return view('cogs.create');
    }
}
