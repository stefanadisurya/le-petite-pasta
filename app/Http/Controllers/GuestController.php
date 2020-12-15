<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home() {
        $products = Product::all()->take(2);
        return view('guest.home', ['products' => $products]);
    }

    public function menu() {
        $products = Product::all();
        return view('guest.menu', ['products' => $products]);
    }

    public function order(Product $product) {
        return redirect()->route('login');
    }
}
