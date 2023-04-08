@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Add Salary</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('salaries.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee:</label>
                                <select name="employee_id" id="employee_id" class="form-select" required>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount:</label>
                                <input type="number" name="amount" id="amount" step="0.01" min="0"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="pay_date" class="form-label">Pay Date:</label>
                                <input type="date" name="pay_date" id="pay_date" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Add Salary</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
