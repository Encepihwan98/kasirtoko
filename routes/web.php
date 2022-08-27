<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UnitController;
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
    return view('dashboard.dashboard');
});

Route::get('/transaksi', function () {
    return view('transaksi.transaksi');
});

Route::get('/produk', function () {
    return view('produk.produk');
});

Route::get('/kategori', function () {
    return view('produk.kategori');
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

Route::get('/user', function () {
    return view('user.user');
});

Route::get('/transaksi', function () {
    return view('transaksi.transaksi');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/login', function () {
    return view('login');
});
