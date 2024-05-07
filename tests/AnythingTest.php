<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Models\Anything;

test('command exists', function () {
    $this->artisan('anything')
        ->expectsOutput('Anything')
        ->assertSuccessful();
});

test('route exists', function () {
    $this->get('anything')
        ->assertSee('Anything')
        ->assertOk();
});

test('database table is empty', function () {
    $this->assertDatabaseEmpty(Anything::class);
});
