<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models;

use Dex\Laravel\Anything\Models\Concerns\AnythingMorphed;
use Dex\Laravel\Anything\Models\Concerns\HasAnythingType;
use Dex\Laravel\Anything\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $type
 * @property string $slug
 * @property string $label
 */
class Anything extends Model
{
    use AnythingMorphed;
    use HasAnythingType;
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected $table = 'anything';

    protected $fillable = ['type', 'slug', 'label'];

    public static function get(string $slug, ?string $type = null): static
    {
        $type ??= (new static())->getAnythingType(); // @phpstan-ignore-line

        /** @var static $model */
        $model = static::query()
            ->where('type', $type)
            ->where('slug', $slug)
            ->first();

        return $model;
    }
}
