<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Http\Controllers;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Http\Request;

class StoreAnythingController
{
    public function __invoke(string $type, string $slug, Request $request): Anything
    {
        /** @var Anything $anything */
        $anything = Anything::query()->updateOrCreate([
            'type' => $type,
            'slug' => $slug,
            'label' => $request->input('label'),
        ]);

        return $anything;
    }
}
