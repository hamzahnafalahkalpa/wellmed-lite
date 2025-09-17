<?php

use Illuminate\Support\Facades\Route;
use Projects\WellmedLite\Controllers\API\ItemManagement\MedicalItem\MedicalItemController;

Route::apiResource('/medical-item',MedicalItemController::class)->parameters(['medical-item' => 'id']);

