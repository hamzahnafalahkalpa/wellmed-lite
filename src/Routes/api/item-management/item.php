<?php

use Illuminate\Support\Facades\Route;
use Projects\WellmedLite\Controllers\API\ItemManagement\MedicalItem\MedicalItemController;

Route::apiResource('/item',MedicalItemController::class)->parameters(['item' => 'id']);

