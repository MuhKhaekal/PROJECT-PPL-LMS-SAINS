<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\AsistenGroupController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::resource('kelola-akun', AccountsController::class)->middleware('admin');
    Route::resource('study-group', StudyGroupController::class)
    ->middleware('user')
    ->names([
        'index' => 'study-group.index',
        'create' => 'study-group.create',
        'store' => 'study-group.store',
        'show' => 'study-group.show',
        'edit' => 'study-group.edit',
        'update' => 'study-group.update',
        'destroy' => 'study-group.destroy',
    ]);
    Route::resource('asisten-group', AsistenGroupController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'asisten-group.index',
        'create' => 'asisten-group.create',
        'store' => 'asisten-group.store',
        'show' => 'asisten-group.show',
        'edit' => 'asisten-group.edit',
        'update' => 'asisten-group.update',
        'destroy' => 'asisten-group.destroy',
    ]);
    Route::resource('presensi', PresensiController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'presensi.index',
        'create' => 'presensi.create',
        'store' => 'presensi.store',
        'show' => 'presensi.show',
        'edit' => 'presensi.edit',
        'update' => 'presensi.update',
        'destroy' => 'presensi.destroy',
    ]);
});
