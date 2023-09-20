<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function authenticate()
    {
        $this->validate();

        $credentials = [
            'email' => $this->form->email,
            'password' => $this->form->password
        ];

        if (Auth::attempt($credentials, $this->form->remember)) {
            return redirect()->route('posts.index');
        }

        $this->addError('credentials', 'This credentials do not match our system. Please check your email and password.');
    }

    #[Layout('layouts.auth-card')]
    public function render(): View
    {
        return view('livewire.pages.auth.login');
    }
}
