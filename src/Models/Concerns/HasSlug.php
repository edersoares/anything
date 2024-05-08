<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models\Concerns;

use Dex\Laravel\Anything\Models\Anything;

/**
 * @mixin Anything
 */
trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::saving(function (Anything $anything) {
            $anything->setAttribute(
                key: $anything->getSlugColumn(),
                value: $anything->getSlugValue(),
            );
        });
    }

    protected function getSlugColumn(): string
    {
        return 'slug';
    }

    protected function getSlugValue(): string
    {
        /** @var string $slugable */
        $slugable = $this->getAttribute(
            $this->getSlugableColumn(),
        );

        return str($slugable)->slug()->value();
    }

    protected function getSlugableColumn(): string
    {
        return 'label';
    }
}
