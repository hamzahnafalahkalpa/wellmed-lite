<?php

use Illuminate\Support\Facades\Route;
use Projects\WellmedLite\Controllers\API\Menu\MenuController;

Route::get('/menu',[MenuController::class,'index'])->name('menu.index');