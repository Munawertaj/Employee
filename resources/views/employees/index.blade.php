@extends('layout')

@section('page-content')
    <h2>Employee List</h2>

    <p class="text-end">
        <a class="btn btn-primary" href="{{ route('employees.create') }}">Add Employee</a>
    </p>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Joining Date</th>
                <th>Salary</th>
                <th>Email</th>
                <th>Mobile No</th>
                <th>Address</th>
                <th> Actions </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->job_title }}</td>
                    <td>{{ $employee->joining_date }}</td>
                    <td>{{ $employee->salary }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->mobile_no }}</td>
                    <td>{{ $employee->address }}</td>

                    <td>
                    <a class="btn btn-warning me-2" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                    
                    <form method="post" action="{{ route('employees.destroy', $employee->id) }}" onsubmit="return confirm('Are you sure you want to delete this employee?')" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginate links -->
    
    {{ $employees->links() }}
  

@endsection
