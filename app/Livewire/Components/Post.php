<?php

declare(strict_types=1);

namespace App\Livewire\Components;

use App\Models\Post as PostModel;
use Livewire\Component;

class Post extends Component
{
    public PostModel $post;
}
