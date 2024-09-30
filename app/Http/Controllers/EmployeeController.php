<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch paginated employee records, 10 per page
        $employees = Employee::paginate(10);

        // Return the view with the employee data
        return view('employees.index', compact('employees'));
    }
}
