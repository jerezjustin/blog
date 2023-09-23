<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class NewPasswordController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.reset-password');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'min:8|max:32|confirmed'
        ]);

        $status = Password::reset(
            $validated,
            function ($user) use ($validated): void {
                $user->forceFill([
                    'password' => Hash::make($validated['password']),
                    'remember_token' => Str::random(60)
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return Password::PASSWORD_RESET === $status
            ? redirect()->route('login')
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}
