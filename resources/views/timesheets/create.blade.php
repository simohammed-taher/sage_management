<!-- resources/views/timesheets/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add New Timesheet
                    </div>
                    <div class="card-body">
                        <form action="{{ route('timesheets.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="day">Day</label>
                                <input type="date" class="form-control" id="day" name="day" required>
                            </div>
                            <div class="form-group">
                                <label for="attendance">Attendance</label>
                                <select class="form-control" id="attendance" name="attendance" required>
                                    <option value="1">Present</option>
                                    <option value="0">Absent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Employee ID</label>
                                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
                            </div>
                            <div class="form-group">
                                <label for="task_id">Task ID</label>
                                <input type="number" class="form-control" id="task_id" name="task_id" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
