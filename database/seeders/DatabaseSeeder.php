<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Read;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(10)->create();

        Post::factory(10)->create()->each(
            function (Post $post) use ($categories): void {
                $post->categories()->attach($categories->random(rand(1, 2)));
            }
        );

        Read::factory(25)->create();

        Comment::factory(25)->create();
    }
}
