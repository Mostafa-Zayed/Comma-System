<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use  App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SessionController;


/** Route Dashboard */
Route::get('/', [MainController::class, 'index'])->name('index');

/** Employees Urls */
Route::resource('employees', EmployeeController::class)->where(['employee' => '[0-9]+']);

/**  Clients Urls */
Route::resource('clients', ClientController::class)->where(['client' => '[0-9]+']);


/** Route Dashboard */
Route::get('/', [MainController::class, 'index'])->name('index');
=======


/**  Rooms Urls */
Route::resource('rooms', RoomController::class)->where(['room' => '[0-9]+']);

/**  Types Urls */
Route::resource('types', TypeController::class)->where(['type' => '[0-9]+']);

/**  Sessions Urls */
Route::resource('sessions', SessionController::class)->where(['type' => '[0-9]+']);


// End Session
Route::post('sessions/{session}/end', [SessionController::class, 'end'])->name('sessions.end');


