<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;

class ResetPassword extends Component
{
    #[Rule('required')]
    public $token;

    #[Url, Locked, Rule('required|email')]
    public $email;

    #[Rule('required|min:8|max:32|confirmed')]
    public $password;

    public $password_confirmation;

    public function mount(string $token): void
    {
        $this->token = $token;
    }

    public function save(): void
    {
        $this->validate();

        $credentials = [
            'token' => $this->token,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation
        ];

        $status = Password::reset($credentials, function ($user): void {
            $user->forceFill([
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(60)
            ])->save();

            event(new PasswordReset($user));
        });

        if (Password::PASSWORD_RESET === $status) {
            $this->redirect(Login::class);
        }

        $this->addError('email', __($status));
    }

    #[Layout('layouts.auth-card')]
    public function render(): View
    {
        return view('livewire.pages.auth.reset-password');
    }
}
