<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch paginated employee records, 10 per page
        $employees = Employee::paginate(5);

        // Return the view with the employee data
        return view('employees.index')
                            ->with('employees', $employees);
    }

    // Show the form to create a new employee
    public function create() {
        return view('employees.create');
    }

    // Store a new employee in the database
    public function store(Request $request) {
        // Validate employee data before storing
        $request->validate([
            'name' => 'required|string',
            'job_title' => 'required|string',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'email' => 'required|email',
            'mobile_no' => 'required|string|max:15|unique:employees,mobile_no',
            'address' => 'required|string',
        ]);

        // Create the new employee record
        Employee::create($request->all());

        // Redirect to the employee index page with a success message
        return redirect()->route('employees.index');
    }
}
