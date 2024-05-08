<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Http\Controllers;

use Dex\Laravel\Anything\Models\Anything;

class AnythingController
{
    public function __invoke()
    {
        return Anything::query()->get();
    }
}
