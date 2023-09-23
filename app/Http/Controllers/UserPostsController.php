<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UserPostsController extends Controller
{
    public function index(): View
    {
        $posts = Auth::user()->posts()->paginate(10);

        return view('pages.dashboard', [
            'posts' => $posts
        ]);
    }
}
