<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/merchant/home', function ()
{
    $products = Product::all();
    return view('home', compact('products'));
});
Route::get('/superAdmin/home', function ()
{
    $products = Product::all();
    return view('home', compact('products'));
})->middleware('guest:user');

Route::get('/admin/signup', function ()
{
    return view('signup');
});

Route::get('/superAdmin/login', function()
{
    return view('login');
})->middleware('guest:user');

Route::post('/superAdmin/login', [\App\Http\Controllers\LoginController::class, 'adminLogin']);

Route::post('/admin/signup', 'App\Http\Controllers\SignupController@createUser');

Route::post('/Product', 'App\Http\Controllers\ProductController@show')->where('id', '[0-9]+');

// Route::get('/upload', function ($file){

// });
