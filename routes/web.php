<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController as AdminIndexController;

use App\Http\Controllers\IndexController;

Route::prefix("admin")-> group(function() {

    Route::get('/',[AdminIndexController::class,'index']);
});


Route::get('/',[IndexController::class,'index']);