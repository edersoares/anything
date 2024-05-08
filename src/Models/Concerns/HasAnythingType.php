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
            if (empty($model->getAttribute('type'))) {
                $model->setAttribute('type', $model->getAnythingType());
            }
        });

        static::addGlobalScope(function (Builder $builder) {
            /** @var Anything $model */
            $model = $builder->getModel();

            $type = $model->getAnythingType();

            // Allow that Anything model can query any type
            if ($type === 'anything') {
                return;
            }

            $builder->where('type', $type);
        });
    }

    public function getAnythingType(): string
    {
        return str(class_basename($this))->slug()->value();
    }
}
