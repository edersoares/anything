<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models\Concerns;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */
trait HasAnythingRelations
{
    use AnythingMorph;
    use AnythingMorphed;

    public function getMorphClass(): string
    {
        return $this->type();
    }

    public function type(): string
    {
        return $this->getTable();
    }
}
