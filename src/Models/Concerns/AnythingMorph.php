<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models\Concerns;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin Anything
 */
trait AnythingMorph
{
    public function morphToManyAnything(string $related): MorphToMany
    {
        return $this->morphToMany(
            related: $related,
            name: 'anythingable',
            table: 'anythingable',
            foreignPivotKey: 'anythingable_id',
            relatedPivotKey: 'anything_id',
        );
    }
}
