<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //  return view('welcome');
    // return view('admin.templates.default');
    return view('frontend.templates.default');
});

// Route::get('login', function () {
//     return view('auth.login');
// });


// Auth::routes();
 Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth' => 'CheckRole:customer']], function () {
    Route::namespace('Customer')->group(function () {
        Route::get('infocustomer', 'CustomerController@index')->name('infocustomer');
         Route::get('dataproduk', 'CustomerController@dataproduk')->name('dataproduk');
    });
});

Route::group(['middleware' => ['auth' => 'CheckRole:admin']], function () {
    Route::namespace('Admin')->group(function () {
        Route::get('katagori', 'KatagoriController@index')->name('katagori');
        Route::get('produk', 'ProdukController@index')->name('produk');
        Route::get('datacustomer', 'CustomerController@index')->name('datacustomer');
         Route::get('datasuppliyer', 'SuppliyerController@index')->name('datasuppliyer');
    });
});

Route::group(['middleware' => ['auth' => 'CheckRole:cashier']], function () {
    Route::namespace('Cashier')->group(function () {
        Route::get('dataprodukcashier', 'ProdukController@index')->name('dataprodukcashier');
        Route::get('datacustomercashier', 'CustomerController@index')->name('datacustomercashier');
        Route::get('datasuppliyercashier', 'SuppliyerController@index')->name('datasuppliyercashier');
    });
});