<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models\Concerns;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @mixin Anything
 */
trait AnythingMorphed
{
    public function morphedByManyAnything(string $related): MorphToMany
    {
        return $this->morphedByMany(
            related: $related,
            name: 'anythingable',
            table: 'anythingable',
            foreignPivotKey: 'anythingable_id',
            relatedPivotKey: 'anything_id',
        );
    }
}
