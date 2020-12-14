<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        $products = Product::all()->take(2);
        return view('guest.home', ['products' => $products]);
    }
}
