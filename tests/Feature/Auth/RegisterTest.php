<?php

declare(strict_types=1);

use App\Livewire\Pages\Auth\Register;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

it('tests registration screen can be rendered', function () {
    get(route('register'))->assertStatus(Response::HTTP_OK);
});

it('test users can register using the register screen', function (): void {
    livewire(Register::class)
        ->set('form.name', $name = 'Test Name')
        ->set('form.email', $email = 'test@example.com')
        ->set('form.password', 'password')
        ->set('form.password_confirmation', 'password')
        ->call('save')
        ->assertHasNoErrors(['form.name', 'form.email', 'form.password']);

    assertAuthenticated();

    assertDatabaseHas('users', [
        'name' => $name,
        'email' => $email
    ]);
});
