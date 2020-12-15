<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function home() {
        $products = Product::all();
        return view('global.home', ['products' => $products]);
    }
}
