<!-- resources/views/timesheets/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Timesheet
                    </div>
                    <div class="card-body">
                        <form action="{{ route('timesheets.update', $timesheet->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="day">Day</label>
                                <input type="date" class="form-control" id="day" name="day"
                                    value="{{ $timesheet->day }}" required>
                            </div>
                            <div class="form-group">
                                <label for="attendance">Attendance</label>
                                <select class="form-control" id="attendance" name="attendance" required>
                                    <option value="1" {{ $timesheet->attendance ? 'selected' : '' }}>Present</option>
                                    <option value="0" {{ !$timesheet->attendance ? 'selected' : '' }}>Absent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Employee ID</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id"
                                    value="{{ $timesheet->matricule }}" required>
                            </div>
                            <div class="form-group">
                                <label for="task_id">Task ID</label>
                                <input type="number" class="form-control" id="task_id" name="task_id"
                                    value="{{ $timesheet->task_id }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
