<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use App\Livewire\Pages\Post\Index;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function save()
    {
        $this->validate();

        $this->form->register();

        return $this->redirect(Index::class);
    }

    #[Layout('layouts.auth-card')]
    public function render(): View
    {
        return view('livewire.pages.auth.register');
    }
}
