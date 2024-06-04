<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models;

use Dex\Laravel\Anything\Models\Builders\AnythingBuilder;
use Dex\Laravel\Anything\Models\Concerns\AnythingMorphed;
use Dex\Laravel\Anything\Models\Concerns\HasAnythingType;
use Dex\Laravel\Anything\Models\Concerns\HasSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property string $slug
 * @property string $label
 *
 * @method static Builder whereType(string $type)
 * @method static Builder whereSlug(string $slug)
 * @method static AnythingBuilder query()
 */
class Anything extends Model
{
    use AnythingMorphed;
    use HasAnythingType;
    use HasFactory;
    use HasSlug;

    protected $table = 'anything';

    protected $fillable = ['type', 'slug', 'label'];

    public static function get(string $slug, ?string $type = null): static
    {
        $type ??= (new static())->getAnythingType(); // @phpstan-ignore-line

        /** @var static $model */
        $model = static::query()
            ->whereType($type)
            ->whereSlug($slug)
            ->first();

        return $model;
    }

    public function newEloquentBuilder($query): AnythingBuilder
    {
        return new AnythingBuilder($query);
    }
}
