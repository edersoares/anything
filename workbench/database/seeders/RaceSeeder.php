<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Seeders;

use Illuminate\Database\Seeder;
use Workbench\Dex\Laravel\Anything\Database\Factories\RaceFactory;

class RaceSeeder extends Seeder
{
    public function run(): void
    {
        RaceFactory::new()->create(['label' => 'White']);
        RaceFactory::new()->create(['label' => 'Black']);
        RaceFactory::new()->create(['label' => 'Multiracial']);
        RaceFactory::new()->create(['label' => 'Asians']);
        RaceFactory::new()->create(['label' => 'Indigenous']);
        RaceFactory::new()->create(['label' => 'Not Specified']);
    }
}
