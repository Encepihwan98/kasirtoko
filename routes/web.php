<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\UnitController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



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
    return view('auth.login');
});

Route::get('/transaksi', function () {
    return view('transaksi.transaksi');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/produk', 'index');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/kategori', 'index');
});

// Route::get('/satuan-produk', function () {
//     return view('produk.satuanproduk');
// });

Route::controller(UnitController::class)->group(function () {
    Route::get('/satuan-produk', 'index');
    Route::get('/satuan-produk/{id}', 'show');
    Route::post('/satuan-produk', 'store');
    Route::post('/satuan-produk/{id}', 'update');
    Route::delete('/satuan-produk/{id}', 'destroy');
});

// Route::controller(UserController::class)->group(function () {
//     Route::get('/list-user', 'index');
//     Route::get('/list-user/{id}', 'show');
//     Route::post('/list-user', 'store');
//     Route::post('/list-user/{id}', 'update');
//     Route::delete('/list-user/{id}', 'destroy');
// });


Route::get('/user', function () {
    return view('user.user');
});

Route::get('/transaksi', function () {
    return view('transaksi.transaksi');
});

Route::get('/profile', function () {
    return view('user.profile');
});


// Route::get('/login', function () {
//     return view('login');
// });

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login', function () {
//     return view('login');sid
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
