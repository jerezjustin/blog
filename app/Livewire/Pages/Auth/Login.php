<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use App\Livewire\Pages\Post\Index;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function authenticate()
    {
        $this->validate();

        $this->form->login();

        return $this->redirect(Index::class);
    }

    #[Layout('layouts.auth-card')]
    public function render(): View
    {
        return view('livewire.pages.auth.login');
    }
}
