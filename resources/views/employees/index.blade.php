@extends('layout')

@section('page-content')
    <h2>Employee List</h2>

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
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginate links -->
    
    {{ $employees->links() }}
  

@endsection
