<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LeaveController;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;


use App\Http\Controllers\PlanningController;
use App\Http\Controllers\TimesheetController;
// use Illuminate\Support\Facades\Route;
// Import your controllers at the top of the file
// ...

Route::middleware(['auth'])->group(function () {

    Route::resource('employees', EmployeeController::class);
    Route::resource('salaries', SalaryController::class);
    Route::resource('leaves', LeaveController::class)->parameters(['leaves' => 'leave']);
    // ...
    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);});


// ...
Route::resource('plannings', PlanningController::class);
Route::resource('timesheets', TimesheetController::class);


// This will register the default Laravel auth routes (login, register, password reset, etc.)
Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
