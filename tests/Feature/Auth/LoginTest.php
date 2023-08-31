<?php

declare(strict_types=1);

use App\Livewire\Pages\Auth\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\assertAuthenticatedAs;

use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

use Symfony\Component\HttpFoundation\Response;

uses(RefreshDatabase::class);

it('tests login screen can be rendered', function (): void {
    get(route('login'))->assertStatus(Response::HTTP_OK);
});

it('tests users can authenticate using the login screen', function (): void {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make($password = 'password')
    ]);

    livewire(Login::class)
        ->set('form.email', $user->email)
        ->set('form.password', $password)
        ->call('authenticate')
        ->assertHasNoErrors();

    assertAuthenticatedAs($user);
});

it('tests users cannot authenticate with invalid credentials', function (): void {
    livewire(Login::class)
        ->call('authenticate')
        ->assertHasErrors(['form.email', 'form.password'])
        ->set('form.email', 'invalid-email@example.com')
        ->set('form.password', 'Invalid Password Example')
        ->call('authenticate')
        ->assertHasErrors(['credentials']);
});
