<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function users() {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function showUser(User $user) {
        return view('admin.showuser', ['user' => $user]);
    }

    public function destroyUser(User $user) {
        User::destroy($user->id); 
        Alert::success('Delete User Success!', 'User deleted');

        return redirect()->route('users');
    }

    public function add() {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:20',
            'price' => 'required|numeric|min:10000',
            'description' => 'required|min:20', 
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $filename = $request->image->getClientOriginalName();

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $filename
        ]);

        $request->image->storeAs('image', $filename, 'public');
        Alert::success('Add Product Success!', 'New product added');

        return redirect()->route('home');
    }

    public function edit(Product $product) {
        return view('admin.update', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:4|max:20',
            'price' => 'required|numeric|min:10000',
            'description' => 'required|min:20',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $filename = $request->image->getClientOriginalName();

        Product::where('id', $product->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $filename
        ]);

        $request->image->storeAs('image', $filename, 'public');
        Alert::success('Edit Product Success!', 'Product details updated');

        return redirect()->route('home');
    }

    public function delete(Product $product) {
        return view('admin.delete', ['product' => $product]);
    }

    public function destroy(Product $product) {
        Product::destroy($product->id);
        Alert::success('Delete Success!', 'Product deleted');

        return redirect()->route('home');
    }
}
