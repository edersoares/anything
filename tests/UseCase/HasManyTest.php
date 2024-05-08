<?php

declare(strict_types=1);

use Workbench\Dex\Laravel\Anything\App\Models\Deficiency;
use Workbench\Dex\Laravel\Anything\App\Models\Person;
use Workbench\Dex\Laravel\Anything\Database\Factories\PersonFactory;
use Workbench\Dex\Laravel\Anything\Database\Seeders\DeficiencySeeder;

test('anything using has many relation', function () {
    $this->seed(DeficiencySeeder::class);

    $blind = Deficiency::get('blind');
    $deaf = Deficiency::get('deaf');
    $mute = Deficiency::get('mute');

    /** @var Person $person */
    $person = PersonFactory::new()->create();

    $person->deficiencies()->attach($blind->getKey());

    expect($person->deficiencies()->count())->toBe(1)
        ->and($person->deficiencies->first()->label)->toBe($blind->label);

    $person->deficiencies()->attach($deaf->getKey());
    $person->deficiencies()->attach($mute->getKey());

    expect($person->deficiencies()->count())->toBe(3);
});
