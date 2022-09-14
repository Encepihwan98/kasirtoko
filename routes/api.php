<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UnitAPIController;

use App\Http\Controllers\CategoryAPIController;
use App\Http\Controllers\ProductAPIController;

use App\Http\Controllers\UserApiController;

use App\Http\Controllers\TransactionAPIController;
use App\Http\Controllers\TransactionController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/transaksi/generate-pdf', [TransactionAPIController::class, 'getPDF']);

Route::apiResources([
    'satuan-produk' => UnitAPIController::class,
    'kategori' => CategoryAPIController::class,
    'product' => ProductAPIController::class,
    'users' => UserApiController::class,
    'transaksi' => TransactionAPIController::class,
    'monthly-sales' => TransactionController::class,
]);


