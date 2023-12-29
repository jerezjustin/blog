<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use App\QueryFilters\SortByTitle;
use App\QueryFilters\FilterByTitle;
use App\QueryFilters\SortByCreatedAt;
use App\QueryFilters\FilterByCategory;
use Illuminate\Contracts\Pagination\Paginator;

class PostService
{
    public function __construct(
        private readonly Request $request,
        private readonly FilterService $filterService
    ) {
    }

    public function getPaginatedPosts(): Paginator
    {
        $posts = $this->filterService->filter(Post::query())
            ->using([
                new FilterByTitle($this->request->input('title')),
                new FilterByCategory($this->request->input('category')),
                match ($this->request->input('sortBy')) {
                    'title' => new SortByTitle($this->request->input('direction')),
                    default => new SortByCreatedAt($this->request->input('direction')),
                }
            ]);

        $posts = $posts->paginate(10)->withQueryString();

        return $posts;
    }
}
