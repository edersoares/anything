<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\App\Models;

use Dex\Laravel\Anything\Models\Concerns\HasAnythingRelations;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property int $gender_id
 * @property int $race_id
 * @property string $name
 * @property Gender $gender
 * @property Race $race
 * @property Collection<int, Deficiency> $deficiencies
 */
class Person extends Model
{
    use HasAnythingRelations;

    protected $table = 'person';

    protected $fillable = [
        'gender_id',
        'race_id',
        'name',
    ];

    /**
     * @return BelongsTo<Gender, Person>
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * @return BelongsTo<Race, Person>
     */
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function deficiencies(): MorphToMany
    {
        return $this->morphToManyAnything(Deficiency::class);
    }
}
