<?php

namespace App\Http\Controllers;

use App\DetailTransaction;
use App\HeaderTransaction;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function home() {
        $products = Product::all();
        $halfproducts = Product::all()->take(2);
        return view('global.home', ['products' => $products, 'halfproducts' => $halfproducts]);
    }

    public function show() {
        $transactions = HeaderTransaction::where('user_id', auth()->user()->id)->get();
        $alltransactions = HeaderTransaction::all();
        return view('global.transactions', ['transactions' => $transactions, 'alltransactions' => $alltransactions]);
    }

    public function detailTransaction(HeaderTransaction $header) {
        $transactions = DetailTransaction::withTrashed()->where('header_id', $header->id)->get();
        return view('global.transactiondetails', ['transactions' => $transactions]);
    }
}
