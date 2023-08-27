<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    #[Layout('layouts.auth-card')]
    public function render(): View
    {
        return view('livewire.pages.auth.login');
    }
}
