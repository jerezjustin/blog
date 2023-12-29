<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function __construct(private readonly PostService $postService)
    {
    }

    public function index(): View
    {
        $posts = $this->postService->getPaginatedPosts();

        $posts->load(['author', 'reads', 'comments', 'categories']);

        return view('pages.post.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post): View
    {
        $post = $post->load(['author', 'categories']);

        return view('pages.post.show', compact('post'));
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

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('dashboard');
    }
}
