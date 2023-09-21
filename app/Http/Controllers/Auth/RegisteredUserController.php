<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8|max:16|confirmed'
        ]);

        $user = User::create([
            ...$validated,
            'password' => Hash::make($validated['password'])
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
