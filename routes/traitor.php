<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Traitor\HomeController;
use App\Http\Controllers\Traitor\OrderController;
use App\Http\Controllers\Traitor\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('traitor')->group(function () {
    Route::prefix('traitor')->name('traitor.')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::match(['get', 'post'], '/order', [OrderController::class, 'index'])->name('orders.index');
        Route::match(['get', 'post'], '/order/allowed', [OrderController::class, 'allowed'])->name('orders.allowed');
        Route::match(['get', 'post'], '/order/denied', [OrderController::class, 'denied'])->name('orders.denied');
        Route::match(['get', 'post'], '/order/delivered', [OrderController::class, 'delivered'])->name('orders.delivered');
        Route::match(['get', 'post'], '/order/show/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/order/allow/{id}', [OrderController::class, 'allow'])->name('orders.allow');
        Route::post('/order/deny/{id}', [OrderController::class, 'deny'])->name('orders.deny');

        Route::resource('/products', ProductController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
