<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Http\Controllers;

class AnythingController
{
    public function __invoke(): string
    {
        return 'Anything';
    }
}
