<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
//---------Logout--------------
Route::get('/logout', function(Request $request){
    // Auth::logout();
    Auth::guard('user')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/merchant/signin');
});






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
})->middleware('guest:user')->name('login');

Route::post('/aboveAdmin/signin', [\App\Http\Controllers\SigninController::class, 'aboveAdminSignin']);

Route::get('/merchant/signin', function()
{
    return view('signin', ['role' => 'merchant']);
})->middleware('guest:user');

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
})->middleware('auth:user');





Route::get('/aboveAdmin/upload', function(){
    return view ('uploadProduct');
});
Route::post('/Product', 'App\Http\Controllers\ProductController@show')->where('id', '[0-9]+');
Route::post('/Product/Edit', 'App\Http\Controllers\ProductController@edit')->where('id', '[0-9]+');
Route::post('/Product/Update', 'App\Http\Controllers\ProductController@update')->where('id', '[0-9]+');
Route::post('/Product/Delete', 'App\Http\Controllers\ProductController@delete')->where('id', '[0-9]+');
Route::post('/aboveAdmin/product/upload', 'App\Http\Controllers\ProductController@upload');




Route::post('/superAdmin/CRUD', function(){
    $users = User::all();
    return view('CRUD', compact('users'));
});
Route::post('/superAdmin/CRUD/Edit', 'App\Http\Controllers\UserPermissionController@showUserPermission');
Route::post('/superAdmin/CRUD/update', 'App\Http\Controllers\UserPermissionController@editPermission')->name('post.editPermission');

