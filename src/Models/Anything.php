<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $label
 * @property string $slug
 * @property string $group
 */
class Anything extends Model
{
    use HasFactory;

    protected $table = 'anything';

    protected static function boot(): void
    {
        parent::boot();

        static::saving(function (Anything $anything) {
            $anything->slug = str($anything->label)->slug()->value();
        });
    }
}
