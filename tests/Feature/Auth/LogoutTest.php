<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

it('tests users can logout', function (): void {
    $user = User::factory()->create();

    actingAs($user);

    assertAuthenticated();

    post(route('logout'))
        ->assertRedirect(route('home'));

    expect(Auth::check())->toBe(false);
});
