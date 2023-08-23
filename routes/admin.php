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
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

        Route::get('/traitors', [TraitorController::class, 'index'])->name('admin.traitors.index');
        Route::get('/traitors/allowed', [TraitorController::class, 'allowed'])->name('admin.traitors.allowed');
        Route::get('/traitors/denied', [TraitorController::class, 'denied'])->name('admin.traitors.denied');
        Route::get('/traitors/edit/{id}', [TraitorController::class, 'edit'])->name('admin.traitors.edit');
        Route::get('/traitors/show/{id}', [TraitorController::class, 'show'])->name('admin.traitors.show');
        Route::post('/traitors/allow/{id}', [TraitorController::class, 'allow'])->name('admin.traitors.allow');
        Route::post('/traitors/deny/{id}', [TraitorController::class, 'deny'])->name('admin.traitors.deny');
        Route::post('/traitors/delete/{id}', [TraitorController::class, 'destroy'])->name('admin.traitors.destroy');

        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    });    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
