<?php

namespace App\Http\Controllers;

use App\Cart;
use App\DetailTransaction;
use App\HeaderTransaction;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    public function menu() {
        $products = Product::all();
        return view('member.menu', ['products' => $products]);
    }

    public function order(Product $product) {
        return view('member.order', ['product' => $product]);
    }

    public function store(Request $request, Product $product) {
        $user = auth()->user();

        $this->validate($request, ['quantity' => 'required|numeric|min:1']); 

        if (Cart::where("user_id", $user->id)->count() > 0 && Cart::where("product_id", $product->id)->count() > 0) { 
            Cart::where([
                ["user_id", $user->id],
                ["product_id", $product->id]
            ])->increment('quantity', $request->quantity); 
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity
            ]);
        }

        Alert::success('Add to Cart Success!', 'Product added to cart');

        return redirect()->route('order', $product);
    }

    public function cart() {
        $user = auth()->user();

        $carts = Cart::where("user_id", $user->id)->get();

        return view('member.cart', ['carts' => $carts]);
    }

    public function updateQty(Request $request, Cart $cart) {
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1'
        ]);

        Cart::where("id", $cart->id)->update([
            'quantity' => $request->quantity
        ]);

        Alert::success('Update Quantity Success!', 'Product quantity updated');

        return redirect()->route('cart');
    }

    public function remove(Cart $cart) {
        Cart::destroy($cart->id);
        Alert::success('Remove Product Success!', 'Product removed from cart');

        return redirect()->route('cart');
    }

    public function checkout() {

        $user = auth()->user();

        HeaderTransaction::create([
            'user_id' => $user->id,
        ]);

        $header = HeaderTransaction::latest('id')->first();
        $carts = Cart::where('user_id', $user->id)->get();

        foreach ($carts as $cart) {
            DetailTransaction::create([
                'quantity' => $cart->quantity,
                'header_id' => $header->id,
                'product_id' => $cart->product_id
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        Alert::success('Checkout Success!', 'Enjoy your food');

        return redirect()->route('menu');
    }
}
