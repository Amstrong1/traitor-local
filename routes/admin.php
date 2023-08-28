<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TraitorController;

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

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::get('/traitors', [TraitorController::class, 'index'])->name('traitors.index');
        Route::get('/traitors/allowed', [TraitorController::class, 'allowed'])->name('traitors.allowed');
        Route::get('/traitors/denied', [TraitorController::class, 'denied'])->name('traitors.denied');
        Route::get('/traitors/edit/{id}', [TraitorController::class, 'edit'])->name('traitors.edit');
        Route::get('/traitors/show/{id}', [TraitorController::class, 'show'])->name('traitors.show');
        Route::post('/traitors/allow/{id}', [TraitorController::class, 'allow'])->name('traitors.allow');
        Route::post('/traitors/deny/{id}', [TraitorController::class, 'deny'])->name('traitors.deny');
        Route::post('/traitors/delete/{id}', [TraitorController::class, 'destroy'])->name('traitors.destroy');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
