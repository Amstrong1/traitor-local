<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Traitor\Auth\TraitorPasswordController;
use App\Http\Controllers\Traitor\Auth\RegisteredTraitorController;
use App\Http\Controllers\Traitor\Auth\TraitorNewPasswordController;
use App\Http\Controllers\Traitor\Auth\TraitorVerifyEmailController;
use App\Http\Controllers\Traitor\Auth\TraitorPasswordResetLinkController;
use App\Http\Controllers\Traitor\Auth\TraitorConfirmablePasswordController;
use App\Http\Controllers\Traitor\Auth\TraitorAuthenticatedSessionController;
use App\Http\Controllers\Traitor\Auth\TraitorEmailVerificationPromptController;
use App\Http\Controllers\Traitor\Auth\TraitorEmailVerificationNotificationController;


Route::middleware('guest')->group(function () {
    Route::get('register-traitor', [RegisteredTraitorController::class, 'create'])
        ->name('register.traitor');

    Route::post('register-traitor', [RegisteredTraitorController::class, 'store']);

    Route::get('login-traitor', [TraitorAuthenticatedSessionController::class, 'create'])
        ->name('login.traitor');

    Route::post('login-traitor', [TraitorAuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password-traitor', [TraitorPasswordResetLinkController::class, 'create'])
        ->name('password.request.traitor');

    Route::post('forgot-password-traitor', [TraitorPasswordResetLinkController::class, 'store'])
        ->name('password.email.traitor');

    Route::get('reset-password-traitor/{token}', [TraitorNewPasswordController::class, 'create'])
        ->name('password.reset.traitor');

    Route::post('reset-password-traitor', [TraitorNewPasswordController::class, 'store'])
        ->name('password.store.traitor');
});

Route::middleware('traitor')->group(function () {
    Route::get('verify-email', TraitorEmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', TraitorVerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [TraitorEmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [TraitorConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [TraitorConfirmablePasswordController::class, 'store']);

    Route::put('password', [TraitorPasswordController::class, 'update'])->name('password.update');

    Route::post('logout/traitor', [TraitorAuthenticatedSessionController::class, 'destroy'])
                ->name('logout.traitor');
});
