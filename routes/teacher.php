<?php

use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Teacher\TeamController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'teacher.'], function() {
    Route::get('dashboard', [HomeController::class, 'index'])->name('index');
    Route::get('teams/{team}', [HomeController::class, 'show'])->name('teams.show');
});
