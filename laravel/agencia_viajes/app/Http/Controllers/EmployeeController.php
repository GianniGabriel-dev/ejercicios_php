<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getEmployeesById()
    {
        $employees = Employee::orderBy('emp_id', 'asc')->get();

        return view('employees.index', compact('employees'));
    }

    public function getEmployeesbyLastName()
    {
        $employees = Employee::orderBy('emp_lastname', 'asc')
            ->orderBy('emp_firstname', 'asc')
            ->get();

        return view('employees.index', compact('employees'));
    }

    public function getEmployeesStartWithA()
    {
        $employees = Employee::where('emp_lastname', 'like', 'A%')
            ->orderBy('emp_lastname', 'asc')
            ->orderBy('emp_firstname', 'asc')
            ->get();

        return view('employees.index', compact('employees'));
    }

    public function getEmployeesBornIn()
    {
        $employees = Employee::whereYear('emp_birth_date', 1980)
            ->orderBy('emp_lastname', 'asc')
            ->orderBy('emp_firstname', 'asc')
            ->get();

        return view('employees.index', compact('employees'));
    }
}