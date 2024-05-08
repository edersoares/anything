<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Factories;

use Dex\Laravel\Anything\Database\Factories\AnythingFactory;
use Workbench\Dex\Laravel\Anything\App\Models\Race;

/**
 * @extends AnythingFactory<Race>
 */
class RaceFactory extends AnythingFactory
{
    protected $model = Race::class;
}
