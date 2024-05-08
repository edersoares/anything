<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Models\Anything;
use Workbench\Dex\Laravel\Anything\App\Models\Gender;
use Workbench\Dex\Laravel\Anything\App\Models\Race;
use Workbench\Dex\Laravel\Anything\Database\Seeders\GenderSeeder;
use Workbench\Dex\Laravel\Anything\Database\Seeders\RaceSeeder;

test('fetch all available anything', function () {
    $anything = Anything::factory()->count(3)->create();

    $this->get('/anything')
        ->assertOk()
        ->assertJson($anything->toArray());
});

test('fetch some type', function () {
    $this->seed(GenderSeeder::class);
    $this->seed(RaceSeeder::class);

    $anything = Gender::query()->get();

    $this->get('/anything/gender')
        ->assertOk()
        ->assertJson($anything->toArray());

    $anything = Race::query()->get();

    $this->get('/anything/race')
        ->assertOk()
        ->assertJson($anything->toArray());
});
