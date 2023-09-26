<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TraitorController;
use App\Http\Controllers\Admin\AdminProductController;

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
        Route::delete('/traitors/delete/{id}', [TraitorController::class, 'destroy'])->name('traitors.destroy');
        Route::get('/traitors/mail/{id}', [TraitorController::class, 'mailCreate'])->name('traitors.mail.create');
        Route::post('/traitors/mail/{id}', [TraitorController::class, 'mailSend'])->name('traitors.mail.send');

        Route::resource('products', AdminProductController::class);
        
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/mail/{id}', [UserController::class, 'mailCreate'])->name('users.mail.create');
        Route::post('/users/mail/{id}', [UserController::class, 'mailSend'])->name('users.mail.send');
        
        Route::get('/mailbox/sent', [HomeController::class, 'mailSent'])->name('mail.sent');
        Route::get('/mailbox/receipt', [HomeController::class, 'mailReceipt'])->name('mail.receipt');

        Route::get('/mailbox/show/{id}', [HomeController::class, 'show'])->name('mails.show');
        Route::delete('/mailbox/show/{id}', [HomeController::class, 'destroy'])->name('mails.destroy');
    });    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
