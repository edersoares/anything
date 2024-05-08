<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Providers;

use Illuminate\Support\ServiceProvider;

class AnythingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/anything.php');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom([
                __DIR__ . '/../../database/migrations',
            ]);
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/anything.php', 'anything');
    }
}
