<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

//    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//                ->name('password.request');
//
//    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//                ->name('password.email');
//
//    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//                ->name('password.reset');
//
//    Route::post('reset-password', [NewPasswordController::class, 'store'])
//                ->name('password.store');
});

Route::middleware('auth')->group(function () {
//    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                ->name('verification.notice');
//
//    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                ->middleware(['signed', 'throttle:6,1'])
//                ->name('verification.verify');
//
//    Route::post('e`mail/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                ->middleware('throttle:6,1')
//                ->name('verification.send');
//
//    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//                ->name('password.confirm');
//
//    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
//
//    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('/tickets', [PagesController::class, 'tickets'])->name('tickets');
    Route::get('/detail_ticket/{id}', [PagesController::class, 'detail_ticket'])->name('detail_ticket');

    Route::get('/admin', [PagesController::class, 'admin'])->middleware('role.admin')->name('admin');
    Route::get('/create_event', [PagesController::class, 'create_event'])->middleware('role.admin')->name('create_event');
    Route::post('/process_create_event', [PagesController::class, 'process_create_event'])->middleware('role.admin')->name('process_create_event');

    Route::get('/edit_event/{id}', [PagesController::class, 'edit_event'])->middleware('role.admin')->name('edit_event');
    Route::post('/process_edit_event/{id}', [PagesController::class, 'process_edit_event'])->middleware('role.admin')->name('process_edit_event');
    Route::get('/process_delete_event/{id}', [PagesController::class, 'process_delete_event'])->middleware('role.admin')->name('process_delete_event');

    Route::get('/process_buy_event/{id}', [PagesController::class, 'process_buy_event'])->name('process_buy_event');
});
