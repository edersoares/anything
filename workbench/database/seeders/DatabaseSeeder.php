<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Workbench\Dex\Laravel\Anything\App\Models\Gender;
use Workbench\Dex\Laravel\Anything\App\Models\Race;
use Workbench\Dex\Laravel\Anything\Database\Factories\PersonFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            GenderSeeder::class,
            RaceSeeder::class,
        ]);

        $male = Gender::get('male');
        $female = Gender::get('female');
        $white = Race::get('white');
        $black = Race::get('black');

        PersonFactory::new()->state(new Sequence(
            ['gender_id' => $female->getKey()],
            ['gender_id' => $male->getKey()],
        ))->state(new Sequence(
            ['race_id' => $black->getKey()],
            ['race_id' => $white->getKey()],
            ['race_id' => $white->getKey()],
            ['race_id' => $black->getKey()],
        ))->count(9)->create();
    }
}
