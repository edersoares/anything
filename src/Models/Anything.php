<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models;

use Dex\Laravel\Anything\Models\Concerns\HasAnythingType;
use Dex\Laravel\Anything\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $label
 * @property string $type
 * @property string $slug
 */
class Anything extends Model
{
    use HasAnythingType;
    use HasFactory;
    use HasSlug;

    protected $table = 'anything';

    protected $fillable = ['label', 'type'];

    public static function get(string $slug, ?string $type = null): static
    {
        $type ??= (new static())->type();

        /** @var static $model */
        $model = static::query()
            ->where('type', $type)
            ->where('slug', $slug)
            ->first();

        return $model;
    }
}
