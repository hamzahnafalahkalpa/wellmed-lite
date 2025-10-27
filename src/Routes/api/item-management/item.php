<?php

use Illuminate\Support\Facades\Route;
use Projects\WellmedLite\Controllers\API\ItemManagement\Item\ItemController;

Route::apiResource('/item',ItemController::class)->parameters(['item' => 'id']);

