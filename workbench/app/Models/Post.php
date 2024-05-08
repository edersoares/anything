<?php

namespace Workbench\Dex\Laravel\Anything\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $category_id
 * @property string $title
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = ['category_id', 'title'];
}
