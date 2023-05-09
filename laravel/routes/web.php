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
})->middleware('guest:user')->name('welcome');

//---------Logout--------------
Route::get('/logout', function(Request $request){
    Auth::guard('user')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect(route('welcome'));
})->name('logout');


//-----------Signup-------------
Route::get('/admin/signup', function ()
{
    return view('signup', ['role' => 'admin']);
})->name('get.admin.signup');
Route::post('/admin/signup', [\App\Http\Controllers\SignupController::class, 'createUserAdmin'])->name('post.admin.signup');


Route::get('/merchant/signup', function ()
{
    return view('signup', ['role' => 'merchant']);
})->name('get.merchant.signup');
Route::post('/merchant/signup', [\App\Http\Controllers\SignupController::class, 'createUserMerchant'])->name('post.merchant.signup');


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


//-------------Home-----------------
Route::group(['middleware' => 'can:admin'], function(){
    Route::get('/admin/home', function(){
        $products = Product::all();
        return view('home', compact('products'));
    })->middleware('auth:user')->name('get.admin.home');
});

Route::group(['middleware' => 'can:merchant'], function(){
    Route::get('/merchant/home', function(){
        $products = Product::all();
        return view('home', compact('products'));
    })->middleware('auth:user')->name('get.merchant.home');
});



//----------Product---------
// SuperAdmin and Admin do
Route::group(['middleware' => 'can:aboveAdmin'], function(){
    Route::prefix('aboveAdmin')->group(function(){
        Route::get('/upload', function (){
            return view ('uploadProduct');
        })->middleware('auth:user')->name('get.create');
        Route::post('/Product', 'App\Http\Controllers\ProductController@show')->where('id', '[0-9]+')->middleware('auth:user')->name('post.product');
        Route::post('/Product/Edit', 'App\Http\Controllers\ProductController@edit')->where('id', '[0-9]+')->middleware('auth:user')->name('post.edit');
        Route::post('/Product/Update', 'App\Http\Controllers\ProductController@update')->where('id', '[0-9]+')->middleware('auth:user')->name('post.update');
        Route::post('/Product/Delete', 'App\Http\Controllers\ProductController@delete')->where('id', '[0-9]+')->middleware('auth:user')->name('post.delete');
        Route::post('/Product/Create', 'App\Http\Controllers\ProductController@upload')->middleware('auth:user')->name('post.create');
    });
});
//Merchant does
Route::post('/Product', 'App\Http\Controllers\ProductController@show')->where('id', '[0-9]+')->middleware('auth:user')->name('post.product');


//SuperAdmin does
Route::group(['middleware' => 'can:superAdmin'], function(){
    Route::prefix('superAdmin')->group(function () {
        Route::get('/home', function (){
            $products = Product::all();
            return view('home', compact('products'));
        })->middleware('auth:user')->name('get.superAdmin.home');

        Route::get('/CRUD', function(){
            $users = User::all();
            return view('CRUD', compact('users'));
        })->middleware('auth:user')->name('get.superAdmin.showUsers');
        Route::post('/CRUD/edit', 'App\Http\Controllers\UserPermissionController@showUserPermission')->name('post.showUserPermission');
        Route::post('/CRUD/update', 'App\Http\Controllers\UserPermissionController@editPermission')->name('post.editPermission');
        Route::post('/CRUD/delete', 'App\Http\Controllers\UserPermissionController@deleteUser')->name('post.deleteUser');
    });
});
