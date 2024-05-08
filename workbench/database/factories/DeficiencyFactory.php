<?php

declare(strict_types=1);

namespace Workbench\Dex\Laravel\Anything\Database\Factories;

use Dex\Laravel\Anything\Database\Factories\AnythingFactory;
use Workbench\Dex\Laravel\Anything\App\Models\Deficiency;

/**
 * @extends AnythingFactory<Deficiency>
 */
class DeficiencyFactory extends AnythingFactory
{
    protected $model = Deficiency::class;
}
