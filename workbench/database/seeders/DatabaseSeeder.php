<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Seeders;

use Illuminate\Database\Seeder;
use Workbench\Dex\Laravel\Anything\Database\Factories\PostFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostFactory::new()->count(10)->create();
    }
}
