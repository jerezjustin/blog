<?php

declare(strict_types=1);

use App\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => redirect()->route('posts.index'))->name('home');
Route::get('/posts', Livewire\Pages\Post\Index::class)->name('posts.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', Livewire\Pages\Auth\Login::class)->name('login');
    Route::get('/register', Livewire\Pages\Auth\Register::class)->name('register');
    Route::get('/forgot-password', Livewire\Pages\Auth\ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password', Livewire\Pages\Auth\ResetPassword::class)->name('reset-password');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function (Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');
});
