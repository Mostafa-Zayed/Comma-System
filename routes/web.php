<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/** Employees Urls */
Route::resource('employees', EmployeeController::class)->where(['employee' => '[0-9]+']);


//  Clients Urls
Route::resource('clients','\App\Http\Controllers\ClientController')->where(['client' => '[0-9]+']);


   //Route::resource('categories','\App\Http\Controllers\CategoryControllers')->except(['show','create']);
/** Route Dashboard */
Route::get('/', [MainController::class, 'index'])->name('index');




