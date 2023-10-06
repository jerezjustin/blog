<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::query();

        $posts->with(['author', 'reads', 'comments']);

        $posts->when($request->input('title'), function (Builder $query) use ($request): void {
            $query->where('title', 'like', "%{$request->input('title')}%");
        });

        $posts->when($request->input('category'), function (Builder $query) use ($request): void {
            $query->whereHas('categories', function (Builder $query) use ($request): void {
                $query->where('slug', $request->input('category'));
            });
        });

        $posts = $posts
            ->orderBy(
                $request->input('sortBy') ?? 'created_at',
                $request->input('direction') ?? 'desc'
            )
            ->paginate(10)
            ->withQueryString();

        return view('pages.post.index', [
            'posts' => $posts
        ]);
    }

    public function create(): View
    {
        return view('pages.post.create');
    }

    public function store(PostStoreRequest $request): RedirectResponse
    {
        $request->user()->posts()->create($request->validated());

        return redirect()->route('dashboard');
    }

    public function edit(Post $post): View
    {
        if (request()->user()->cannot('update', $post)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return view('pages.post.edit', [
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect()->route('dashboard');
    }
}
