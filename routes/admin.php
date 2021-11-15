<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','as' => 'admin.'], function() {
    Route::get('/', [HomeController::class,'index'])->name('index');

    Route::resource('teachers', TeacherController::class);
    Route::resource('events', EventController::class);
    Route::resource('teams', TeamController::class);
});
