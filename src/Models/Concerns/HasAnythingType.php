<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models\Concerns;

use Dex\Laravel\Anything\Models\Anything;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Anything
 */
trait HasAnythingType
{
    public static function bootHasAnythingType(): void
    {
        static::saving(function (Anything $model) {
            $model->setAttribute('type', $model->type());
        });

        static::addGlobalScope(function (Builder $builder) {
            /** @var Anything $model */
            $model = $builder->getModel();
            $builder->where('type', $model->type());
        });
    }

    public function type(): string
    {
        return str(class_basename($this))->slug()->value();
    }
}
