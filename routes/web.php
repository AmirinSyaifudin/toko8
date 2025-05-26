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
        Route::get('profilcustomer', 'CustomerController@profil')->name('profilcustomer');
        Route::get('settingprofil', 'CustomerController@create')->name('settingprofil');
        Route::post('savecustomer', 'CustomerController@store')->name('savecustomer.store');
        Route::get('editprofil/{id}', 'CustomerController@edit')->name('editprofil');
        Route::put('update/{id}', 'CustomerController@update')->name('update');
        // Route::post('saveprofil', 'CustomerController@store')->name('saveprofil.store');

        Route::get('dataproduk', 'CustomerController@dataproduk')->name('dataproduk');
        Route::get('editprofilcustomer', 'CustomerController@editprofil')->name('editprofilcustomer');
    });
});

Route::group(['middleware' => ['auth' => 'CheckRole:suppliyer']], function () {
    Route::namespace('Suppliyer')->group(function () {
        Route::get('suppliyer', 'SuppliyerController@index')->name('suppliyer'); 
        Route::get('suppliyerproduk', 'SuppliyerController@supliyerproduk')->name('suppliyerproduk');
        Route::get('profilsuppliyer', 'SuppliyerController@profil')->name('profilsuppliyer');
        Route::get('editprofilsuppliyer', 'SuppliyerController@editprofil')->name('editprofilsuppliyer');
        Route::get('setting', 'SuppliyerController@create')->name('setting');
        Route::post('saveprofil', 'SuppliyerController@store')->name('saveprofil.store');
        Route::get('editprofil/{id}', 'SuppliyerController@edit')->name('editprofil');
        Route::put('update/{id}', 'SuppliyerController@update')->name('update');

        Route::get('katagori', 'KatagoriController@index')->name('katagori');
        Route::get('katagori/data', 'DataController@katagori')->name('katagori.data');
        Route::get('/katagori/create', 'KatagoriController@create')->name('katagori.create');
        Route::post('/katagori', 'KatagoriController@store')->name('katagori.store');
        Route::get('/katagori/{katagori}/edit', 'KatagoriController@edit')->name('katagori.edit');
        Route::put('/katagori/{katagori}','KatagoriController@update')->name('katagori.update');
        Route::delete('/katagori/{katagori}','KatagoriController@destroy')->name('katagori.destroy');
    });
});

Route::group(['middleware' => ['auth' => 'CheckRole:admin']], function () {
    Route::namespace('Admin')->group(function () {
        // Route::get('katagori', 'KatagoriController@index')->name('katagori');
        // Route::get('katagori/data', 'DataController@katagori')->name('katagori.data');
        // Route::get('/katagori/create', 'KatagoriController@create')->name('katagori.create');
        // Route::post('/katagori', 'KatagoriController@store')->name('katagori.store');
        // Route::get('/katagori/{katagori}/edit', 'KatagoriController@edit')->name('katagori.edit');
        // Route::put('/katagori/{katagori}','KatagoriController@update')->name('katagori.update');
        // Route::delete('/katagori/{katagori}','KatagoriController@destroy')->name('katagori.destroy');
        
        // suppliyer
        Route::get('datasuppliyer', 'SuppliyerController@index')->name('datasuppliyer');
        Route::get('datasuppliyer/data', 'DataController@suppliyer')->name('datasuppliyer.data');
        Route::get('/datasuppliyer/create', 'SuppliyerController@create')->name('datasuppliyer.create');
        Route::post('/datasuppliyer', 'SuppliyerController@store')->name('datasuppliyer.store');

        // customer
        Route::get('datacustomer', 'CustomerController@index')->name('datacustomer');
        Route::get('datacustomer/data', 'DataController@customer')->name('datacustomer.data');
        Route::get('/datacustomer/create', 'CustomerController@create')->name('datacustomer.create');
        Route::post('/datacustomer', 'CustomerController@store')->name('datacustomer.store');

        // Produk   
        Route::get('produk', 'ProdukController@index')->name('produk');
        Route::get('datacustomer', 'CustomerController@index')->name('datacustomer');

    });
});

Route::group(['middleware' => ['auth' => 'CheckRole:cashier']], function () {
    Route::namespace('Cashier')->group(function () {
        Route::get('dataprodukcashier', 'ProdukController@index')->name('dataprodukcashier');
        Route::get('datacustomercashier', 'CustomerController@index')->name('datacustomercashier');
        Route::get('datasuppliyercashier', 'SuppliyerController@index')->name('datasuppliyercashier');
    });
});

