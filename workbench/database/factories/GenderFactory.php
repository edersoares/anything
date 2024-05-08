<?php

namespace Workbench\Dex\Laravel\Anything\Database\Factories;

use Dex\Laravel\Anything\Database\Factories\AnythingFactory;
use Workbench\Dex\Laravel\Anything\App\Models\Gender;

/**
 * @extends AnythingFactory<Gender>
 */
class GenderFactory extends AnythingFactory
{
    protected $model = Gender::class;
}
