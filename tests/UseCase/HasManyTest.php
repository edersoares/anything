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

test('ensure anything has many relation do query correcly', function () {
    $this->seed(DeficiencySeeder::class);

    $blind = Deficiency::get('blind');
    $deaf = Deficiency::get('deaf');
    $mute = Deficiency::get('mute');

    /** @var Person $blindPerson */
    $blindPerson = PersonFactory::new()->create();

    /** @var Person $deafAndMutePerson */
    $deafAndMutePerson = PersonFactory::new()->create();

    /** @var Person $mutePerson */
    $mutePerson = PersonFactory::new()->create();

    /** @var Person $blindAndMutePerson */
    $blindAndMutePerson = PersonFactory::new()->create();

    $blindPerson->deficiencies()->attach($blind->getKey());
    $deafAndMutePerson->deficiencies()->attach($deaf->getKey());
    $deafAndMutePerson->deficiencies()->attach($mute->getKey());
    $mutePerson->deficiencies()->attach($mute->getKey());
    $blindAndMutePerson->deficiencies()->attach($blind->getKey());
    $blindAndMutePerson->deficiencies()->attach($mute->getKey());

    $countBlindPerson = Person::query()
        ->whereHas('deficiencies', fn ($query) => $query->where('slug', 'blind'))
        ->count();

    $countDeafPerson = Person::query()
        ->whereHas('deficiencies', fn ($query) => $query->where('slug', 'deaf'))
        ->count();

    $countMutePerson = Person::query()
        ->whereHas('deficiencies', fn ($query) => $query->where('slug', 'mute'))
        ->count();

    expect($countBlindPerson)->toBe(2)
        ->and($countDeafPerson)->toBe(1)
        ->and($countMutePerson)->toBe(3)
        ->and($blind->persons()->count())->toBe(2)
        ->and($deaf->persons()->count())->toBe(1)
        ->and($mute->persons()->count())->toBe(3);
});
