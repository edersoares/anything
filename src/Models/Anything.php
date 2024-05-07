<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anything extends Model
{
    use HasFactory;

    protected $table = 'anything';
}
