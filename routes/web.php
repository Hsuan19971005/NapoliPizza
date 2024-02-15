<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderSearchController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// page
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/location', [PageController::class, 'location'])->name('location');

// order system
Route::prefix('onlineOrder')->group(function () {
    Route::get('/', function () {
        return redirect(route('order.index'));
    });
    Route::resource('order', OrderController::class)->only(['index', 'create', 'store']);
    Route::post('/oroder/add-delivery', [OrderController::class, 'addDelivery'])->name('order.add-delivery');
    Route::get('/order/menu', [OrderController::class, 'showMenu'])->name('order.menu');
    Route::post('/order/add-to-cart', [OrderController::class, 'addToCart'])->name('order.add-to-cart');
    Route::get('/order/check-cart', [OrderController::class, 'checkCart'])->name('order.check-cart');
    Route::patch('/order/update-cart', [OrderController::class, 'updateCart'])->name('order.update-cart');
    Route::resource('orderSearch', OrderSearchController::class)->only(['index', 'show']);
});

// auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
