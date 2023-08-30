<?php

namespace App\Livewire\Forms\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Form;

class LoginForm extends Form
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required')]
    public $password;

    public $remember;

    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (!Auth::attempt($credentials, $this->remember)) {
            $this->addError('credentials', 'This credentials do not match our system. Please check your email and password.');
        }
    }
}
