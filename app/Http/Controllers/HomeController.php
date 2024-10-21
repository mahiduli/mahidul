<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $allproducts=Product::all();
        return view('user_template.home',compact('allproducts'));
    }
}
