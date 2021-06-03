<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Employees Urls
Route::resource('employees','\App\Http\Controllers\EmployeeController');



// Route Dashboard
<<<<<<< HEAD
Route::get('/',[\App\Http\Controllers\MainController::class,'index'])->name('index');
=======
Route::get('/',[\App\Http\Controllers\MainController::class,'index']);

>>>>>>> 4660862093d0a7362d145b202583dbc41bf85e5d
