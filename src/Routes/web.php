<?php

use Hanafalah\LaravelSupport\Facades\LaravelSupport;
use Illuminate\Support\Facades\Route;
use Projects\WellmedLite\Middlewares\SetTenant;

Route::group([
    'middleware' => ['auth:sanctum', 'verified', SetTenant::class],
    'prefix'     => '/'
], function () {
    LaravelSupport::callRoutes(__DIR__.'/web');
});