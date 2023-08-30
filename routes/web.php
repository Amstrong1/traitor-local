<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\User\UserController;

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

Route::get('password/first/{id}', [PasswordController::class, 'edit'])->name('password.first.edit');
Route::post('password/first/update/{id}', [PasswordController::class, 'update'])->name('password.first.update');

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/home', [UserController::class, 'index'])->name('home.index');
Route::match(['get', 'post'], '/home/products', [UserController::class, 'indexProducts'])->name('home.products');
Route::match(['get', 'post'], '/home/product/show/{id}', [UserController::class, 'showProduct'])->name('home.show.product');
Route::match(['get', 'post'], '/home/profil', [UserController::class, 'profil'])->name('user.profil');
Route::match(['get', 'post'], '/home/cart', [UserController::class, 'cart'])->name('user.cart');
Route::match(['get', 'post'], '/home/order', [UserController::class, 'order'])->name('user.order');
Route::match(['get', 'post'], '/home/order/store', [UserController::class, 'storeOrder'])->name('store.order');
Route::match(['get', 'post'], '/home/cart/remove/{session_product}', [UserController::class, 'removeProduct'])->name('remove.product');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/profile/admin', [ProfileController::class, 'edit'])->name('profile.admin.edit');
    Route::patch('/profile/admin', [ProfileController::class, 'update'])->name('profile.admin.update');
    Route::delete('/profile/admin', [ProfileController::class, 'destroy'])->name('profile.admin.destroy');
});

Route::middleware('traitor')->group(function () {
    Route::get('/profile/traitor', [ProfileController::class, 'edit'])->name('profile.traitor.edit');
    Route::patch('/profile/traitor', [ProfileController::class, 'update'])->name('profile.traitor.update');
    Route::delete('/profile/traitor', [ProfileController::class, 'destroy'])->name('profile.traitor.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';
require __DIR__ . '/traitor-auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/traitor.php';
