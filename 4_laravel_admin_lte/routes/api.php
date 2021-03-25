<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\PositionController;

Route::get('positions', PositionController::class)->name('positions');
Route::get('employees', EmployeeController::class)->name('employees');
