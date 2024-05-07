<?php

declare(strict_types=1);

namespace Dex\Laravel\Anything\Console\Commands;

use Illuminate\Console\Command;

class AnythingCommand extends Command
{
    protected $signature = 'anything';

    protected $description = 'Anything';

    public function handle(): int
    {
        $this->comment('Anything');

        return self::SUCCESS;
    }
}
