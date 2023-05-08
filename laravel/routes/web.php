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
//--------Welcome Page--------------
Route::get('/', function(){
    return view('welcome');
})->name('welcome');





//---------Logout--------------
Route::get('/logout', function(Request $request){
    Auth::guard('user')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    // return redirect('/merchant/signin');
    return redirect(route('welcome'));
});






//-----------Signup-------------
Route::get('/admin/signup', function ()
{
    return view('signup', ['role' => 'admin']);
})->name('get.admin.signup');
Route::post('/admin/signup', [\App\Http\Controllers\SignupController::class, 'createUserAdmin']);


Route::get('/merchant/signup', function ()
{
    return view('signup', ['role' => 'merchant']);
})->name('get.merchant.signup');
Route::post('/merchant/signup', [\App\Http\Controllers\SignupController::class, 'createUserMerchant']);


//-----------Signin-------------
Route::get('/aboveAdmin/signin', function()
{
    return view('signin', ['role' => 'aboveAdmin']);
})->middleware('guest:user')->name('get.aboveAdmin.signin');

Route::post('/aboveAdmin/signin', [\App\Http\Controllers\SigninController::class, 'aboveAdminSignin'])->name('post.aboveAdmin.signin');

Route::get('/merchant/signin', function()
{
    return view('signin', ['role' => 'merchant']);
})->middleware('guest:user')->name('get.merchant.signin');

Route::post('/merchant/signin', [\App\Http\Controllers\SigninController::class, 'merchantSignin'])->name('post.merchant.signin');





//-----------Home-------------
// Route::prefix('/aboveAdmin')->group(['middleware' => 'can:admin'], function () {
//     Route::get('/home', function ()
//     {
//         $products = Product::all();
//         return view('home', compact('products'));
//     })->name('get.aboveAdmin.home');
// });
// Route::prefix('/merchant')->group(['middleware' => 'can:merchant'], function () {
//     Route::get('/home', function ()
//     {
//         $products = Product::all();
//         return view('home', compact('products'));
//     })->name('get.merchant.home');
// });
Route::group(['middleware' => 'can:admin'], function(){
    Route::get('/aboveAdmin/home', function(){
        $products = Product::all();
        return view('home', compact('products'));
    })->middleware('auth:user')->name('get.aboveAdmin.home');
});
Route::group(['middleware' => 'can:merchant'], function(){
    Route::get('/merchant/home', function(){
        $products = Product::all();
        return view('home', compact('products'));
    })->middleware('auth:user')->name('get.merchant.home');
});


// //-----------Home-------------

// Route::get('/merchant/home', function ()
// {
//     $products = Product::all();
//     return view('home', compact('products'));
// })->name('get.merchant.home');

// Route::get('/aboveAdmin/home', function ()
// {
//     $products = Product::all();
//     return view('home', compact('products'));
// })->name('get.aboveAdmin.home');




//----------About Product---------
Route::get('/aboveAdmin/upload', function(){
    return view ('uploadProduct');
});
Route::post('/Product', 'App\Http\Controllers\ProductController@show')->where('id', '[0-9]+');
Route::post('/Product/Edit', 'App\Http\Controllers\ProductController@edit')->where('id', '[0-9]+');
Route::post('/Product/Update', 'App\Http\Controllers\ProductController@update')->where('id', '[0-9]+');
Route::post('/Product/Delete', 'App\Http\Controllers\ProductController@delete')->where('id', '[0-9]+');
Route::post('/aboveAdmin/product/upload', 'App\Http\Controllers\ProductController@upload');

// Route::prefix('/superAdmin')->group(['middleware' => 'can:superAdmin'], function () {
//     Route::get('/superAdmin/home', function (){
//         $products = Product::all();
//         return view('home', compact('products'));
//     })->name('get.superAdmin.home');
// });


//----------About CRUD---------------
Route::post('/superAdmin/CRUD', function(){
    $users = User::all();
    return view('CRUD', compact('users'));
});
Route::post('/superAdmin/CRUD/Edit', 'App\Http\Controllers\UserPermissionController@showUserPermission');
Route::post('/superAdmin/CRUD/update', 'App\Http\Controllers\UserPermissionController@editPermission')->name('post.editPermission');

