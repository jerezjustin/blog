<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertAuthenticatedAs;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);

test('users can authenticate using login screen', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make($password = 'password')
    ]);

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => $password
    ])->assertSessionHasNoErrors();

    assertAuthenticatedAs($user);
});

test('users cannot authenticate with invalid credentials', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make($password = 'password')
    ]);

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'invalid password'
    ])->assertSessionHasErrors(['credentials']);


    $this->post(route('login'))
        ->assertSessionHasErrors(['email', 'password']);

    assertGuest();
});

test('users can logout', function (): void {
    $user = User::factory()->create();

    actingAs($user);

    assertAuthenticated();

    post(route('logout'))
        ->assertRedirect(route('home'));

    assertGuest();
});
