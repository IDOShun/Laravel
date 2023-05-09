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
        //validation
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['max:200'],
            //must be uniqued to OTHER products, not mine
            'SKU' => ['required', 'unique:products', 'max:16'],
        ]);
        $product = Product::findOrFail($request['id']);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->SKU = $request->SKU;
        $product->save();
        if(auth('user')->user()->role_id == 1){
            return redirect(route('get.superAdmin.home'));
        }else if(auth('user')->user()->role_id == 2){
            return redirect(route('get.admin.home'));
        }
    }

    public function upload(Request $request){
        //validation
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['max:200'],
            'SKU' => ['required', 'unique:products', 'max:16'],
            'image' => ['max:100'],
        ]);
        $data = $request->except('image');
        $file = $request->file('image');
        if($file == null){
            $read_path = 'storage/images/products/defaultImg.jpg';
        }else{
            $path = $file->store('/public/images/products');

            $read_path = str_replace('public/', 'storage/', $path);
        }
        $product = new Product();
        $product->create([
            'name' => $request['name'],
            'description' => $request['description'],
            'image' => $read_path,
            'SKU' => $request['SKU']
        ]);
        if(auth('user')->user()->role_id == 1){
            return redirect(route('get.superAdmin.home'));
        }else if(auth('user')->user()->role_id == 2){
            return redirect(route('get.admin.home'));
        }
    }

    public function delete(Request $request){
        $product = Product::findOrFail($request['id']);
        $product->delete();
        if(auth('user')->user()->role_id == 1){
            return redirect(route('get.superAdmin.home'));
        }else if(auth('user')->user()->role_id == 2){
            return redirect(route('get.admin.home'));
        }
    }
}
