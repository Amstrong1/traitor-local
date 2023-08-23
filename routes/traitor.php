<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Traitor\HomeController;
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

        Route::resource('/products', ProductController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
