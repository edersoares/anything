<?php

namespace Workbench\Dex\Laravel\Anything\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Workbench\Dex\Laravel\Anything\App\Models\Category;
use Workbench\Dex\Laravel\Anything\App\Models\Post;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'category_id' => fn () => Category::factory()->create(),
            'title' => $this->faker->paragraph(),
        ];
    }
}
