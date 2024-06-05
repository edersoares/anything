<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Http\Controllers;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Collection;

class FetchAnythingController
{
    /**
     * @return Collection<int, Anything>
     */
    public function __invoke(string $type): Collection
    {
        /** @var Collection<int, Anything> $anything */
        $anything = Anything::query()
            ->whereType($type)
            ->get();

        return $anything;
    }
}
