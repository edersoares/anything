<?php

declare(strict_types=1);

test('create via PUT request and receive [201]')
    ->put('/anything/some-type/any-label', [
        'label' => 'Any label',
    ])
    ->assertJson([
        'type' => 'some-type',
        'label' => 'Any label',
        'slug' => 'any-label',
    ])
    ->assertCreated();
