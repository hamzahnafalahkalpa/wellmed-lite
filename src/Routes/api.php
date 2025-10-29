<?php

use Hanafalah\ApiHelper\Facades\ApiAccess;
use Hanafalah\LaravelSupport\Facades\LaravelSupport;
use Illuminate\Support\Facades\Route;

ApiAccess::secure(function(){
    Route::group([
        'as' => 'api.'
    ],function(){
        LaravelSupport::callRoutes(__DIR__.'/api');
        Route::get('/health', function () {
            return response()->json([
                'status' => 'ok',
                'app' => config('app.name'),
                'env' => config('app.env'),
                'version' => '1.0.0',
                'time' => now()->toDateTimeString(),
            ]);
        });
    });
});