<?php

declare(strict_types=1);

use App\Livewire\Pages\Auth\ForgotPassword;
use App\Livewire\Pages\Auth\ResetPassword as ResetPasswordPage;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

use function Pest\Livewire\livewire;

use Symfony\Component\HttpFoundation\Response;

test('forgot password page can be rendered', function (): void {
    livewire(ForgotPassword::class)->assertStatus(Response::HTTP_OK);
});

test('reset password link can be requested', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    livewire(ForgotPassword::class)
        ->set('email', $user->email)
        ->call('send')
        ->assertHasNoErrors();

    Notification::assertSentTo($user, ResetPassword::class);
});

test('password can be reset with valid token', function (): void {
    Notification::fake();

    $user = User::factory()->create();

    livewire(ForgotPassword::class)
        ->set('email', $user->email)
        ->call('send');

    Notification::assertSentTo(
        $user,
        ResetPassword::class,
        function ($notification) use ($user) {
            livewire(ResetPasswordPage::class, [
                'token' => $notification->token,
                'email' => $user->email
            ])
                ->assertSet('token', $notification->token)
                ->assertSet('email', $user->email)
                ->set('password', 'password')
                ->set('password_confirmation', 'password');

            return true;
        }
    );

    expect(Hash::check('password', $user->password))->toBe(true);
});
