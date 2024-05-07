<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Providers;

use Dex\Laravel\Anything\Console\Commands\AnythingCommand;
use Illuminate\Support\ServiceProvider;

class AnythingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/anything.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'anything');

        if ($this->app->runningInConsole()) {
            $this->commands([
                AnythingCommand::class,
            ]);

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
