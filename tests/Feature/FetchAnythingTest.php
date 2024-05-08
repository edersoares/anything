<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Models\Anything;

test('fetch all available anythings', function () {
    $anything = Anything::factory()->count(3)->create();

    $this->get('/anything')
        ->assertOk()
        ->assertJson($anything->toArray());
});
