<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

use App\Http\Controllers\IndexController;

Route::prefix("admin")->group(function() {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login',[AdminAuthController::class,'index'])->name('admin.login');
        Route::post('/loginpost',[AdminAuthController::class,'login'])->name('admin.login.post');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout',[AdminAuthController::class,'logout'])->name('admin.logout');

        Route::get('/',[AdminIndexController::class,'index'])->name('admin.index');
    });
});


Route::get('/',[IndexController::class,'index']);