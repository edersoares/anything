<?php

declare(strict_types=1);

use Workbench\Dex\Laravel\Anything\App\Models\Category;
use Workbench\Dex\Laravel\Anything\App\Models\Post;
use Workbench\Dex\Laravel\Anything\Database\Factories\PostFactory;
use function Pest\Laravel\assertDatabaseCount;

test('post has belongs to category', function () {
    PostFactory::new()->create();

    assertDatabaseCount(Post::class, 1);
    assertDatabaseCount(Category::class, 1);
});
