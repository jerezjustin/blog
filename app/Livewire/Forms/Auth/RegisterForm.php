<?php

declare(strict_types=1);

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Rule('required|min:3|max:255')]
    public $name;

    #[Rule('required|email|unique:users,email')]
    public $email;

    #[Rule('required|min:8|max:32|confirmed')]
    public $password;

    public $password_confirmation;

    public function register(): void
    {
    }
}
