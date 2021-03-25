<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PositionController;

Route::group(['middleware' => 'auth'], function () {
    Route::get('', HomeController::class)->name('home');
    Route::resource('positions', PositionController::class, ['except' => ['show']]);
    Route::resource('employees', EmployeeController::class, ['except' => ['show']]);
});

Auth::routes(['login' => true, 'register' => false]);
