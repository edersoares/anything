<?php

namespace Workbench\Dex\Laravel\Anything\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $gender_id
 * @property int $race_id
 * @property string $name
 *
 * @property Gender $gender
 * @property Race $race
 */
class Person extends Model
{
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
}
