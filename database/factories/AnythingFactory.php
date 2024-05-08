<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Database\Factories;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @template TModel of Anything
 *
 * @extends Factory<Anything>
 */
class AnythingFactory extends Factory
{
    protected $model = Anything::class;

    public function definition(): array
    {
        return [
            'label' => $this->faker->word(),
        ];
    }
}
