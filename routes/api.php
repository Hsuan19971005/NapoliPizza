<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderSearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/showShop', [OrderController::class, 'showShop'])->name('api.shop.show');
Route::post('/showProduct', [OrderController::class, 'showProduct'])->name('api.product.show');
Route::post('/showProducts', [OrderController::class, 'showProducts'])->name('api.products.show');
Route::get('/reload-captcha', [OrderSearchController::class, 'reloadCaptcha'])->name('api.reload_captcha');
