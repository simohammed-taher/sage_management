@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Edit Leave</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee:</label>
                                <select name="employee_id" id="employee_id" class="form-select" required>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $employee->id === $leave->employee_id ? 'selected' : '' }}>
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date:</label>
                                <input type="date" name="start_date" id="start_date" value="{{ $leave->start_date }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date:</label>
                                <input type="date" name="end_date" id="end_date" value="{{ $leave->end_date }}"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="reason" class="form-label">Reason:</label>
                                <textarea name="reason" id="reason" rows="4" class="form-control" required>{{ $leave->reason }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="pending" {{ $leave->status === 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="approved" {{ $leave->status === 'approved' ? 'selected' : '' }}>Approved
                                    </option>
                                    <option value="rejected" {{ $leave->status === 'rejected' ? 'selected' : '' }}>Rejected
                                    </option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update Leave</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
