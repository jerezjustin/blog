<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('forgot password page can be rendered', function (): void {
    get(route('forgot-password'))
        ->assertOk();
});

test('reset password link can be requested', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    post(route('forgot-password'), ['email' => $user->email])
        ->assertSessionHasNoErrors();

    Notification::assertSentTo($user, ResetPassword::class);
});

test('password can be reset with valid token', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    post(route('forgot-password'), [
        'email' => $user->email
    ])->assertSessionHasNoErrors();

    Notification::assertSentTo(
        $user,
        ResetPassword::class,
        function ($notification) use ($user) {
            post(
                route(
                    'password.reset',
                    ['token' => $notification->token]
                ),
                [
                    'token' => $notification->token,
                    'email' => $user->email,
                    'password' => 'password',
                    'password_confirmation' => 'password'
                ]
            )->assertSessionHasNoErrors();

            return true;
        }
    );

    expect(Hash::check('password', $user->password))->toBe(true);
});
