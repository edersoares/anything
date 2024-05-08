<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\App\Models;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Anything
{
    public function persons(): HasMany
    {
        return $this->hasMany(Person::class);
    }
}
