<?php

use Illuminate\Support\Facades\Route;
use Projects\WellmedLite\Controllers\API\Setting\{
    BankController,
    PaymentMethodController,
};

Route::group([
    'prefix' => '/finance',
    'as' => 'finance.'
],function(){
    Route::apiResource('/bank',BankController::class)->parameters(['bank' => 'id']);
    Route::apiResource('/payment-method',PaymentMethodController::class)->parameters(['payment-method' => 'id']);
});
