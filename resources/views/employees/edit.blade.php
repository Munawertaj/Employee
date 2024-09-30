@extends('layout')

@section('page-content')

    <h1 align="center">Edit Employee</h1>

    <p class="text-end">
        <a class="btn btn-primary" href="{{ route('employees.index') }}">Back</a>
    </p>

    <form method="post" action="{{ route('employees.update', $employee->id) }}">
        @csrf
        @method('PUT')  <!-- Specify that this is a PUT request for updating -->

        <div class="mb-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $employee->name) }}">
            <div>{{ $errors->first('name') }}</div>
        </div>

        <div class="mb-2">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" name="job_title" value="{{ old('job_title', $employee->job_title) }}">
            <div>{{ $errors->first('job_title') }}</div>
        </div>

        <div class="mb-2">
            <label for="joining_date" class="form-label">Joining Date</label>
            <input type="date" class="form-control" name="joining_date" value="{{ old('joining_date', $employee->joining_date) }}">
            <div>{{ $errors->first('joining_date') }}</div>
        </div>

        <div class="mb-2">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" name="salary" value="{{ old('salary', $employee->salary) }}">
            <div>{{ $errors->first('salary') }}</div>
        </div>

        <div class="mb-2">
            <label for="email" class="form-label">Email (optional)</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $employee->email) }}">
            <div>{{ $errors->first('email') }}</div>
        </div>

        <div class="mb-2">
            <label for="mobile_no" class="form-label">Mobile No</label>
            <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no', $employee->mobile_no) }}">
            <div>{{ $errors->first('mobile_no') }}</div>
        </div>

        <div class="mb-2">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address">{{ old('address', $employee->address) }}</textarea>
            <div>{{ $errors->first('address') }}</div>
        </div>

        <button type="submit" class="btn btn-success me-3">Update</button>

    </form>

@endsection
