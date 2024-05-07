<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Http\Controllers\AnythingController;
use Illuminate\Support\Facades\Route;

Route::get('anything', AnythingController::class);
