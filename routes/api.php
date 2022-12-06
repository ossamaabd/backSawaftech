<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'Products'], function () {
    Route::get('/getListProducts', [ProductController::class, 'getListProducts']);
    Route::get('/getListSuppliers', [ProductController::class, 'getListSuppliers']);
    Route::get('/getProductById/{ProductId}', [ProductController::class, 'getProductById']);

    Route::post('/CreateProduct', [ProductController::class, 'CreateProduct']);
    Route::post('/UpdateProduct/{ProductId}', [ProductController::class, 'UpdateProduct']);
    Route::delete('/DeleteProduct/{ProductId}', [ProductController::class, 'DeleteProduct']);

});

Route::group(['prefix' => 'Orders'], function () {
    Route::get('/getListOrders', [OrderController::class, 'getListOrders']);
    Route::get('/getCustomersAndProducts', [OrderController::class, 'getCustomersAndProducts']);
    Route::get('/getOrderItems/{OrderId}', [OrderController::class, 'getOrderItems']);

    Route::post('/CreateOrder', [OrderController::class, 'CreateOrder']);
    Route::post('/UpdateOrder', [OrderController::class, 'UpdateOrder']);
    Route::delete('/DeleteProduct/{ProductId}', [OrderController::class, 'DeleteProduct']);

});
