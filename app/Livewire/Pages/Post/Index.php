<?php

declare(strict_types=1);

namespace App\Livewire\Pages\Post;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $category;

    #[Url]
    public $direction = 'desc';

    #[Url]
    public $sortBy = 'created_at';

    #[Url]
    public $results = '5';

    #[Url]
    public $title;

    public function cleanInput(string $input): void
    {
        $this->{$input} = null;
    }

    public function render(): View
    {
        $posts = Post::query();

        $posts->with(['author', 'reads', 'comments']);

        $posts->when(
            $this->title,
            fn (Builder $query) => $query->where('title', 'like', "%{$this->title}%")
        );

        $posts->when($this->category, function (Builder $query): void {
            $query->whereHas('categories', function (Builder $query): void {
                $query->where('slug', $this->category);
            });
        });

        $posts = $posts
            ->orderBy($this->sortBy, $this->direction)
            ->paginate(5)
            ->withQueryString();

        return view('livewire.pages.post.index', [
            'posts' => $posts
        ]);
    }
}
