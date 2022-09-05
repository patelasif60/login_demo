<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/company', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
    Route::post('/company', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/company/{company}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
    Route::post('/deletecompany', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/employee', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{employee}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/{employee}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee.update');
    Route::post('/changestatus', [App\Http\Controllers\EmployeeController::class, 'changeStatus'])->name('employee.changestatus');
    Route::post('/deleteemployee', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employee.destroy');
});
