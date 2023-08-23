<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminPasswordController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Auth\AdminNewPasswordController;
use App\Http\Controllers\Admin\Auth\AdminVerifyEmailController;
use App\Http\Controllers\Admin\Auth\AdminPasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\AdminConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\AdminEmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\AdminEmailVerificationNotificationController;


Route::middleware('guest')->group(function () {
    Route::get('register-admin', [RegisteredAdminController::class, 'create'])
        ->name('register.admin');

    Route::post('register-admin', [RegisteredAdminController::class, 'store']);

    Route::get('login-admin', [AdminAuthenticatedSessionController::class, 'create'])
        ->name('login.admin');

    Route::post('login-admin', [AdminAuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password-admin', [AdminPasswordResetLinkController::class, 'create'])
        ->name('password.request.admin');

    Route::post('forgot-password-admin', [AdminPasswordResetLinkController::class, 'store'])
        ->name('password.email.admin');

    Route::get('reset-password-admin/{token}', [AdminNewPasswordController::class, 'create'])
        ->name('password.reset.admin');

    Route::post('reset-password-admin', [AdminNewPasswordController::class, 'store'])
        ->name('password.store.admin');
});

Route::middleware('admin')->group(function () {
    Route::get('verify-email', AdminEmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', AdminVerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [AdminEmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [AdminConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [AdminConfirmablePasswordController::class, 'store']);

    Route::put('password', [AdminPasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AdminAuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
