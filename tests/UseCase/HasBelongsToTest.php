<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Models\Anything;
use Workbench\Dex\Laravel\Anything\App\Models\Category;
use Workbench\Dex\Laravel\Anything\App\Models\Post;
use function Pest\Laravel\assertDatabaseCount;

test('post has belongs to category', function () {
    Post::factory()->create();

    assertDatabaseCount(Post::class, 1);
    assertDatabaseCount(Category::class, 0);
    assertDatabaseCount(Anything::class, 1);
});
