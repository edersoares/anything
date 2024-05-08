<?php

declare(strict_types=1);

use Dex\Laravel\Anything\Http\Controllers\AnythingController;
use Dex\Laravel\Anything\Http\Controllers\StoreAnythingController;
use Illuminate\Support\Facades\Route;

Route::get('anything', AnythingController::class);
Route::put('anything/{type}/{slug}', StoreAnythingController::class);
