<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('posts.index'))->name('home');

Route::middleware('auth')->group(function (): void {
    Route::get('dashboard', [UserPostsController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::resource('posts', PostController::class)->except(['index', 'show']);
});

Route::middleware('guest')->group(function (): void {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('forgot-password');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password/{token}', [NewPasswordController::class, 'store']);
});

Route::resource('posts', PostController::class)->only(['index', 'show']);
