<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/** Employees Urls */
Route::resource('employees', EmployeeController::class);


//  Clients Urls
Route::resource('clients','\App\Http\Controllers\ClientController');

/** Route Dashboard */
Route::get('/', [MainController::class, 'index'])->name('index');

