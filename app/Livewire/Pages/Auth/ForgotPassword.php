<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Rule('required|email')]
    public $email;

    public $message;

    public function send(): void
    {
        $status = Password::sendResetLink(['email' => $this->email]);

        if (Password::RESET_LINK_SENT !== $status) {
            $this->addError('email', __($status));
        }

        $this->message = $status;
    }

    #[Layout('layouts.auth-card')]
    public function render(): View
    {
        return view('livewire.pages.auth.forgot-password');
    }
}
