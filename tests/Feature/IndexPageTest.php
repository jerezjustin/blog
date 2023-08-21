<?php

declare(strict_types=1);

use App\Livewire\Pages\Post\Index;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Livewire\livewire;

use Symfony\Component\HttpFoundation\Response;

uses(RefreshDatabase::class);

beforeEach(fn () => $this->seed(DatabaseSeeder::class));

it('can see index page', function (): void {
    livewire(Index::class)
        ->assertStatus(Response::HTTP_OK);
});
