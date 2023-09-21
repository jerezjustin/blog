<?php

declare(strict_types=1);

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\post;

test('users can register', function (): void {
    $response = post(route('register'), [
        'name' => 'User Name',
        'email' => 'email@test.com',
        'password' => 'password',
        'password_confirmation' => 'password'
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirectToRoute('home');

    assertAuthenticated();
});
