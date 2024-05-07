<?php

namespace Workbench\Dex\Laravel\Anything\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Workbench\Dex\Laravel\Anything\App\Models\Category;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
