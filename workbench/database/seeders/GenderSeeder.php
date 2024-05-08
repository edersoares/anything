<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Seeders;

use Illuminate\Database\Seeder;
use Workbench\Dex\Laravel\Anything\Database\Factories\GenderFactory;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        GenderFactory::new()->create(['label' => 'Male']);
        GenderFactory::new()->create(['label' => 'Female']);
        GenderFactory::new()->create(['label' => 'Not Specified']);
    }
}
