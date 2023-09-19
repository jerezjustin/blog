<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function render()
    {
        $posts = Auth::user()->posts()->paginate(5);

        return view('livewire.pages.dashboard', [
            'posts' => $posts
        ]);
    }
}
