<?php

use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'landing.index')->name('home');
Route::view('/services', 'landing.services')->name('services');
Route::view('/contact', 'landing.contact')->name('contact');

Route::get('/crear-empleado', function () {

    Employee::create([
        'emp_id' => 1,
        'emp_firstname' => 'Gianni',
        'emp_lastname' => 'Gabriel',
        'emp_birth_date' => '2006-09-06',
        'emp_hire_date' => '2024-01-10',
        'salary' => 25000
    ]);
    return 'Empleado creado';
});

Route::get('/employees/by-id', [EmployeeController::class, 'getEmployeesById']);
Route::get('/employees/by-lastname', [EmployeeController::class, 'getEmployeesbyLastName']);
Route::get('/employees/filter-letter', [EmployeeController::class, 'getEmployeesStartWithA']);
Route::get('/employees/filter-year', [EmployeeController::class, 'getEmployeesBornIn']);
