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
//-----------Signup-------------
Route::get('/admin/signup', function ()
{
    return view('signup', ['role' => 'admin']);
});
Route::post('/admin/signup', [\App\Http\Controllers\SignupController::class, 'createUserAdmin']);


Route::get('/merchant/signup', function ()
{
    return view('signup', ['role' => 'merchant']);
});
Route::post('/merchant/signup', [\App\Http\Controllers\SignupController::class, 'createUserMerchant']);


//-----------Signin-------------
Route::get('/aboveAdmin/signin', function()
{
    return view('signin', ['role' => 'aboveAdmin']);
});//->middleware('guest:user');

Route::post('/aboveAdmin/signin', [\App\Http\Controllers\SigninController::class, 'aboveAdminSignin']);

Route::get('/merchant/signin', function()
{
    return view('signin', ['role' => 'merchant']);
});
Route::post('/merchant/signin', [\App\Http\Controllers\SigninController::class, 'merchantSignin']);


//-----------Home-------------

Route::get('/merchant/home', function ()
{
    $products = Product::all();
    return view('home', compact('products'));
});

Route::get('/aboveAdmin/home', function ()
{
    $products = Product::all();
    return view('home', compact('products'));
})->middleware('guest:user');





Route::get('/aboveAdmin/upload', function(){
    return view ('uploadProduct');
});
Route::post('/Product', 'App\Http\Controllers\ProductController@show')->where('id', '[0-9]+');
Route::post('/Product/Edit', 'App\Http\Controllers\ProductController@edit')->where('id', '[0-9]+');
Route::post('/Product/Update', 'App\Http\Controllers\ProductController@update')->where('id', '[0-9]+');
Route::post('/aboveAdmin/product/upload', 'App\Http\Controllers\ProductController@upload');

// Route::get('/upload', function ($file){

// });
