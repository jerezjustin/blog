<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use App\Livewire\Pages\Post\Index;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => Hash::make($this->form->password)
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    #[Layout('layouts.auth-card')]
    public function render(): View
    {
        return view('livewire.pages.auth.register');
    }
}
