<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Http\Controllers;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AnythingController
{
    /**
     * @return Collection<int, Anything>
     */
    public function __invoke(Request $request): Collection
    {
        /** @var Collection<int, Anything> $result */
        $result = Anything::query()
            ->whereSearch((string) $request->string('search'))
            ->get();

        return $result;
    }
}
