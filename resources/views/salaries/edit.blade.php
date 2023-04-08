@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Edit Salary</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee:</label>
                                <select name="employee_id" id="employee_id" class="form-select" required>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $employee->id === $salary->employee_id ? 'selected' : '' }}>
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount:</label>
                                <input type="number" name="amount" id="amount" step="0.01" min="0"
                                    value="{{ $salary->amount }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="pay_date" class="form-label">Pay Date:</label>
                                <input type="date" name="pay_date" id="pay_date" value="{{ $salary->pay_date }}"
                                    class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update Salary</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
