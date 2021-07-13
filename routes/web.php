<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\RoomController;

/** Employees Urls */
Route::resource('employees', EmployeeController::class)->where(['employee' => '[0-9]+']);

/**  Clients Urls */
Route::resource('clients',ClientController::class)->where(['client' => '[0-9]+']);

/** Route Dashboard */
Route::get('/', [MainController::class, 'index'])->name('index');

/**  Rooms Urls */
Route::resource('rooms',RoomController::class)->where(['room' => '[0-9]+']);



