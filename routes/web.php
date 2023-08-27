<?php

declare(strict_types=1);

use App\Livewire;
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

Route::get('/', Livewire\Pages\Post\Index::class)->name('posts.index');

Route::get('/login', Livewire\Pages\Auth\Login::class)->name('login');
Route::get('/register', Livewire\Pages\Auth\Register::class)->name('register');
Route::get('/forgot-password', Livewire\Pages\Auth\ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password', Livewire\Pages\Auth\ResetPassword::class)->name('reset-password');
