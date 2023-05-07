<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Request $request){
        $product = Product::findOrFail($request['id']);
        return view('product', compact('product'));
    }

    public function edit(Request $request){
        $product = Product::findOrFail($request['id']);
        return view('editProduct', compact('product'));
    }

    public function update(Request $request){
        $product = Product::findOrFail($request['id']);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->SKU = $request->SKU;
        // $product->image = $request->image;
        $product->save();
        return redirect('/aboveAdmin/home');
    }

    public function upload(Request $request){
        $data = $request->except('image');
        $file = $request->file('image');
        $path = $file->store('/public/images/products');

        $read_path = str_replace('public/', 'storage/', $path);
        $product = new Product();
        $product->create([
            'name' => $request['name'],
            'description' => $request['description'],
            'image' => $read_path,
            'SKU' => $request['SKU']
        ]);
        return redirect('/aboveAdmin/home');
    }
}
