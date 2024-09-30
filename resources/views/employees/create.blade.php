@extends('layout')

@section('page-content')

    <h1 align="center">New Employee</h1>

    <p class="text-end">
        <a class="btn btn-primary" href="{{ route('employees.index') }}">Back</a>
    </p>

    <form method="post" action="{{ route('employees.store') }}">
        @csrf

        <div class="mb-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            <div>{{ $errors->first('name') }}</div>
        </div>

        <div class="mb-2">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" name="job_title" value="{{ old('job_title') }}">
            <div>{{ $errors->first('job_title') }}</div>
        </div>

        <div class="mb-2">
            <label for="joining_date" class="form-label">Joining Date</label>
            <input type="date" class="form-control" name="joining_date" value="{{ old('joining_date') }}">
            <div>{{ $errors->first('joining_date') }}</div>
        </div>

        <div class="mb-2">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" name="salary" value="{{ old('salary') }}">
            <div>{{ $errors->first('salary') }}</div>
        </div>

        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            <div>{{ $errors->first('email') }}</div>
        </div>

        <div class="mb-2">
            <label for="mobile_no" class="form-label">Mobile No</label>
            <input type="text" class="form-control" name="mobile_no" value="{{ old('mobile_no') }}">
            <div>{{ $errors->first('mobile_no') }}</div>
        </div>

        <div class="mb-2">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address">{{ old('address') }}</textarea>
            <div>{{ $errors->first('address') }}</div>
        </div>

        <button type="submit" class="btn btn-success me-3">Submit</button>

    </form>

@endsection
