<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    actingAs(User::factory()->create());
});

test('create new post page is rendered', function (): void {
    get(route('posts.create'))
        ->assertOk();
});

test('guest users cannot see create post page', function (): void {
    Auth::logout();
    ;

    get(route('posts.create'))
        ->assertRedirectToRoute('login');
});

test('user can create a new post', function (): void {
    post(route('posts.store'), [
        'title' => $title = 'Test Post',
        'slug' => $slug = Str::slug($title),
        'summary' => fake()->text,
        'content' => fake()->text,
        'published' => fake()->boolean
    ])
        ->assertSessionHasNoErrors()
        ->assertRedirectToRoute('dashboard');

    assertDatabaseHas('posts', ['slug' => $slug]);
});
