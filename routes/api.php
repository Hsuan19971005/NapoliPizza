<?php

use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/showShop', [OrderController::class, 'showShop'])->name('api.shop.show');
Route::post('/showProduct', [OrderController::class, 'showProduct'])->name('api.product.show');
Route::post('/showProducts', [OrderController::class, 'showProducts'])->name('api.products.show');
Route::post('/addToCart', [OrderController::class, 'addToCart'])->name('api.cookie.cart.update');
Route::delete('/deleteFromCart', [OrderController::class, 'deleteFromCart'])->name('api.cookie.cart.delete');
