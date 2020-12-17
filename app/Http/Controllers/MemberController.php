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
    public function profile(User $user) {
        return view('member.profile', ['user' => $user]);
    }

    public function deleteAccount(User $user) {
        User::destroy($user->id);
        Alert::success('Remove Account Success!', 'Your account has been removed');

        return redirect()->route('root');
    }

    public function edit(User $user) {
        return view('member.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'string', 'min:6'],
            'address' => ['required', 'min:5'],
            'phone_number' => ['required', 'numeric']
        ]);

        $filename = $request->image->getClientOriginalName();

        User::where('id', $user->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // 'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'image' => $filename
        ]);

        $request->image->storeAs('image', $filename, 'public');
        Alert::success('Edit Profile Success!', 'Your profile has been updated');

        return redirect()->route('profile', ['user' => $user]);
    }

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
