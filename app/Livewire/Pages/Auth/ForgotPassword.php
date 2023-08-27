<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Layout('layouts.auth-card')]
    public function render()
    {
        return view('livewire.pages.auth.forgot-password');
    }
}
