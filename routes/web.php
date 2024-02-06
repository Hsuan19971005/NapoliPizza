<?php

use App\Http\Controllers\Api\OrderController as ApiOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderSearchController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// page
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');

// order system
Route::prefix('onlineOrder')->group(function () {
    Route::get('/', function () {
        return redirect(route('order.index'));
    });
    Route::resource('order', OrderController::class)->only(['index', 'show', 'create', 'store']);
    Route::post('/shop/cookie', [OrderController::class, 'updateShopCookie'])->name('shop.cookie.update');
    Route::post('/product/cookie', [OrderController::class, 'updateProductCookie'])->name('product.cookie.update');
    Route::resource('orderSearch', OrderSearchController::class)->only(['index', 'show']);

    //api
    Route::prefix('api')->group(function () {
        Route::post('/showShop', [ApiOrderController::class, 'showShop']);
        Route::post('/showProduct', [ApiOrderController::class, 'showProduct']);
    });
});

// auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
