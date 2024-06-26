<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\App\Models;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Deficiency extends Anything
{
    public function persons(): MorphToMany
    {
        return $this->morphedByManyAnything(Person::class);
    }
}
