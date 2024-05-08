<?php

namespace Workbench\Dex\Laravel\Anything\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Workbench\Dex\Laravel\Anything\App\Models\Person;

/**
 * @extends Factory<Person>
 */
class PersonFactory extends Factory
{
    protected $model = Person::class;

    public function definition(): array
    {
        return [
            'gender_id' => fn () => GenderFactory::new()->create(),
            'name' => $this->faker->name(),
        ];
    }
}
