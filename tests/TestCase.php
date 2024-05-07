<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Tests;

use Dex\Laravel\Anything\Providers\AnythingServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as Orchestra;
use Workbench\Dex\Laravel\Anything\App\Providers\WorkbenchServiceProvider;

class TestCase extends Orchestra
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(function (string $model) {
            $namespaces = [
                'Dex\\Laravel\\Anything\\Database\\Factories\\' . class_basename($model) . 'Factory',
                'Workbench\\Dex\\Laravel\\Anything\\Database\\Factories\\' . class_basename($model) . 'Factory',
            ];

            foreach ($namespaces as $option) {
                if (class_exists($option)) {
                    return $option;
                }
            }

            return $model;
        });

        Factory::guessModelNamesUsing(function (string $factory) {
            $namespaces = [
                'Dex\\Laravel\\Anything\\Models\\' . Str::replaceLast('Factory', '', class_basename($factory)),
                'Workbench\\Dex\\Laravel\\Anything\\App\\Models\\' . Str::replaceLast('Factory', '', class_basename($factory)),
            ];

            foreach ($namespaces as $option) {
                if (class_exists($option)) {
                    return $option;
                }
            }

            return $factory;
        });
    }

    protected function getPackageProviders($app): array
    {
        return [
            AnythingServiceProvider::class,
            WorkbenchServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
    }
}
