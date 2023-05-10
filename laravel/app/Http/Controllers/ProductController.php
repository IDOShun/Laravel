<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function show(Request $request){
        $product = Product::whereUuid($request['uuid'])->first();
        //when user access to another uuid DIRECTLY
        if($product == null){
            abort(404);
        }
        return view('product', compact('product'));
    }

    public function edit(Request $request){
        $product = Product::whereUuid($request['uuid'])->first();
        //when user access to another uuid DIRECTLY
        if($product == null){
            abort(404);
        }
        return view('editProduct', compact('product'));
    }

    public function update(Request $request){
        $product = Product::findOrFail($request['id']);

        //validation without SKU value
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['max:200'],
        ]);

        // Skip validation when the same SKU has been submitted
        if(strcmp($request['SKU'], $product->SKU) != 0){
            $request->validate([
                'SKU' => ['required', 'unique:products', 'max:16'],
            ]);
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->SKU = $request->SKU;
        $product->save();
        return back();
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

    public function deleteConfirm(Request $request){
        $product = Product::findOrFail($request['id']);
        return view('productDeleteConfirm', compact('product'));
    }

    public function delete(Request $request){
        $product = Product::findOrFail($request['id']);
        //if confirmation is false
        if(strcmp($request['confirm'], 'false')==0){return redirect(route('get.edit').'?uuid='.$product->uuid);}

        $product->delete();
        if(auth('user')->user()->role_id == 1){
            return redirect(route('get.superAdmin.home'));
        }else if(auth('user')->user()->role_id == 2){
            return redirect(route('get.admin.home'));
        }
    }
}
