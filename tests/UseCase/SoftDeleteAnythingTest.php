<?php

declare(strict_types=1);

use Workbench\Dex\Laravel\Anything\App\Models\Race;

test('soft delete', function () {
    $raceBlack = Race::query()->updateOrCreate([
        'label' => 'Black',
    ]);

    $raceWhite = Race::query()->updateOrCreate([
        'label' => 'White',
    ]);

    expect(Race::query()->count())->toBe(2);

    $raceWhite->delete();

    expect(Race::withTrashed()->count())->toBe(2)
        ->and(Race::onlyTrashed()->count())->toBe(1)
        ->and(Race::find($raceWhite->getKey()))->toBeNull()
        ->and(Race::withTrashed()->find($raceWhite->getKey()))->not->toBeNull();

    $raceWhite->forceDelete();

    expect(Race::withTrashed()->count())->toBe(1)
        ->and(Race::onlyTrashed()->count())->toBe(0)
        ->and(Race::find($raceWhite->getKey()))->toBeNull();
});
