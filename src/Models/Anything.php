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
}
