<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\App\Models;

use Dex\Laravel\Anything\Models\Anything;
use Dex\Laravel\Anything\Models\Concerns\AnythingMorphed;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property string $label
 */
class Deficiency extends Anything
{
    use AnythingMorphed;

    public function persons(): MorphToMany
    {
        return $this->morphedByManyAnything(Person::class);
    }
}
