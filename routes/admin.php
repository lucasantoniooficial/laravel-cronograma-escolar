<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','as' => 'admin.'], function() {
    Route::get('/', [HomeController::class,'index'])->name('index');

    Route::resource('teachers', TeacherController::class);
});
