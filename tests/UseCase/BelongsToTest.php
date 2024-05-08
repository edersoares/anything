<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Workbench\Dex\Laravel\Anything\App\Models\Category;
use Workbench\Dex\Laravel\Anything\App\Models\Gender;
use Workbench\Dex\Laravel\Anything\App\Models\Person;
use Workbench\Dex\Laravel\Anything\App\Models\Post;
use Workbench\Dex\Laravel\Anything\App\Models\Race;
use Workbench\Dex\Laravel\Anything\Database\Factories\PersonFactory;
use Workbench\Dex\Laravel\Anything\Database\Seeders\GenderSeeder;
use Workbench\Dex\Laravel\Anything\Database\Seeders\RaceSeeder;

use function Pest\Laravel\assertDatabaseCount;

test('post has belongs to category', function () {
    Post::factory()->create();

    assertDatabaseCount(Post::class, 1);
    assertDatabaseCount(Category::class, 0);
    assertDatabaseCount(Anything::class, 1);
});

test('anything using belongs relation', function () {
    $red = Anything::factory()->create(['label' => 'Red']);
    $green = Anything::factory()->create(['label' => 'Green']);
    $blue = Anything::factory()->create(['label' => 'Blue']);

    Post::factory()->create([
        'category_id' => $green,
    ]);

    assertDatabaseCount(Post::class, 1);
    assertDatabaseCount(Category::class, 0);
    assertDatabaseCount(Anything::class, 3);

    $count = Post::query()
        ->where('category_id', $green->getKey())
        ->count();

    expect($count)->toBe(1);

    $count = Post::query()
        ->whereIn('category_id', [$red->getKey(), $blue->getKey()])
        ->count();

    expect($count)->toBe(0);
});

test('ensure anything extended models do query correcly', function () {
    $this->seed(GenderSeeder::class);
    $this->seed(RaceSeeder::class);

    $this->assertDatabaseCount(Anything::class, 9);

    expect(Gender::query()->count())->toBe(3)
        ->and(Race::query()->count())->toBe(6);

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

    $countMalePerson = Person::query()->whereHas('gender', fn ($query) => $query->where('slug', 'male'))->count();
    $countFemalePerson = Person::query()->whereHas('gender', fn ($query) => $query->where('slug', 'female'))->count();
    $countWhitePerson = Person::query()->whereHas('race', fn ($query) => $query->where('slug', 'white'))->count();
    $countBlackPerson = Person::query()->whereHas('race', fn ($query) => $query->where('slug', 'black'))->count();

    expect($countMalePerson)->toBe(4)
        ->and($countFemalePerson)->toBe(5)
        ->and($countWhitePerson)->toBe(4)
        ->and($countBlackPerson)->toBe(5);
});
