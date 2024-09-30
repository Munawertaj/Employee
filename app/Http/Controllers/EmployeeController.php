<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch paginated employee records, 5 per page
        $employees = Employee::paginate(5);

        // Return the view with the employee data
        return view('employees.index')->with('employees', $employees);
    }

    // Show the form to create a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store a new employee in the database
    public function store(Request $request)
    {
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
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Show the form to edit an existing employee
    public function edit($id)
    {
        // Find the employee by ID
        $employee = Employee::findOrFail($id);

        // Return the view with the employee data
        return view('employees.edit')->with('employee', $employee);
    }

    // Update an existing employee in the database
    public function update(Request $request, $id)
    {
        // Validate employee data before updating
        $request->validate([
            'name' => 'required|string',
            'job_title' => 'required|string',
            'joining_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'email' => 'nullable|email', // Allow null email
            'mobile_no' => 'required|string|max:15|unique:employees,mobile_no,' . $id, // Unique except for current employee
            'address' => 'required|string',
        ]);

        // Find the employee by ID and update the record
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        // Redirect to the employee index page with a success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Optionally, you can add a destroy method to delete an employee
    public function destroy($id)
    {
        // Find the employee by ID and delete the record
        $employee = Employee::findOrFail($id);
        $employee->delete();

        // Redirect to the employee index page with a success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
