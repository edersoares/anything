<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models\Builders;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Builder;

/**
 * @extends Builder<Anything>
 */
class AnythingBuilder extends Builder
{
    public function whereSearch(string $search): self
    {
        $likeOperator = ($temp = config('anything.search.operator')) && is_string($temp) ? $temp : null;

        return $this->when($search, function ($q) use ($search, $likeOperator) {
            $q->whereAny([
                'label',
                'slug',
            ], $likeOperator, '%' . $search . '%');
        });
    }

    public function whereType(string $type): self
    {
        return $this->where('type', $type);
    }

    public function whereSlug(string $slug): self
    {
        return $this->where('slug', $slug);
    }
}
