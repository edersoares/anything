<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Models\Anything;

use Workbench\Dex\Laravel\Anything\App\Models\Gender;
use Workbench\Dex\Laravel\Anything\App\Models\Race;
use Workbench\Dex\Laravel\Anything\Database\Seeders\GenderSeeder;
use Workbench\Dex\Laravel\Anything\Database\Seeders\RaceSeeder;
use function Pest\Laravel\assertDatabaseCount;

use Workbench\Dex\Laravel\Anything\App\Models\Category;
use Workbench\Dex\Laravel\Anything\App\Models\Post;

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
});
