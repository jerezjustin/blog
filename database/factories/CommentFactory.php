<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var Post|Comment $type */
        $type = fake()->randomElement(['App\Models\Post', 'App\Models\Comment']);

        $modelResults = $type::all();

        $id = $modelResults->count() > 1
            ? $modelResults->random()->id
            : $type::factory()->create();

        return [
            'comment' => fake()->paragraphs(rand(1, 3), asText: true),
            'commentable_type' => $type,
            'commentable_id' => $id,
            'user_id' => User::all()->random()->getKey()
        ];
    }
}
