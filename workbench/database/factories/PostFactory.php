<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Factories;

use Dex\Laravel\Anything\Database\Factories\AnythingFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
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
            'category_id' => fn () => AnythingFactory::new()->create(),
            'title' => $this->faker->paragraph(),
        ];
    }
}
