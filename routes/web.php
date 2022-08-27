<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/satuan-produk', function () {
    return view('produk.satuanproduk');
});

Route::get('/user', function () {
    return view('user.user');
});

Route::get('/transaksi', function () {
    return view('transaksi.transaksi');
});