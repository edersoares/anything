<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Seeders;

use Illuminate\Database\Seeder;
use Workbench\Dex\Laravel\Anything\Database\Factories\DeficiencyFactory;

class DeficiencySeeder extends Seeder
{
    public function run(): void
    {
        DeficiencyFactory::new()->create(['label' => 'Blind']);
        DeficiencyFactory::new()->create(['label' => 'Deaf']);
        DeficiencyFactory::new()->create(['label' => 'Mute']);
    }
}
