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
}
