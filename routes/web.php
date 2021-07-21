<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MainController;
use  App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MemberTypeController;
use App\Http\Controllers\MemberController;

/** Route Dashboard */
Route::get('/', [MainController::class, 'index'])->name('index');

/** Employees Urls */
Route::resource('employees', EmployeeController::class)->where(['employee' => '[0-9]+'])->middleware('auth');

/**  Clients Urls */
Route::resource('clients', ClientController::class)->where(['client' => '[0-9]+'])->middleware('auth');


/** Route Dashboard */
Route::get('/', [MainController::class, 'index'])->name('index')->middleware('auth');

/**  Rooms Urls */
Route::resource('rooms', RoomController::class)->where(['room' => '[0-9]+'])->middleware('auth');

/**  Types Urls */
Route::resource('types', TypeController::class)->where(['type' => '[0-9]+'])->middleware('auth');

/**  Sessions Urls */
Route::resource('sessions', SessionController::class)->where(['type' => '[0-9]+'])->middleware('auth');


// End Session
Route::post('sessions/{session}/end', [SessionController::class, 'end'])->name('sessions.end')->middleware('auth');

/** Member Types Urls */
Route::resource('member-types',MemberTypeController::class);

/** Members Url */
Route::resource('members',MemberController::class);


Route::get('/test', [SessionController::class, 'test']);
