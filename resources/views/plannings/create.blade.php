@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Planning</h1>
        <form action="{{ route('plannings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select class="form-control" name="employee_id" id="employee_id">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="task_id">Task</label>
                <select class="form-control" name="task_id" id="task_id">
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="mon">Monday</label>
                <input type="number" class="form-control" name="mon" id="mon" min="0" max="24">
            </div>
            <div class="form-group">
                <label for="tue">Tuesday</label>
                <input type="number" class="form-control" name="tue" id="tue" min="0" max="24">
            </div>
            <div class="form-group">
                <label for="wed">Wednesday</label>
                <input type="number" class="form-control" name="wed" id="wed" min="0" max="24">
            </div>
            <div class="form-group">
                <label for="thu">Thursday</label>
                <input type="number" class="form-control" name="thu" id="thu" min="0" max="24">
            </div>
            <div class="form-group">
                <label for="fri">Friday</label>
                <input type="number" class="form-control" name="fri" id="fri" min="0" max="24">
            </div>
            <div class="form-group">
                <label for="sat">Saturday</label>
                <input type="number" class="form-control" name="sat" id="sat" min="0" max="24">
            </div>
            <div class="form-group">
                <label for="sun">Sunday</label>
                <input type="number" class="form-control" name="sun" id="sun" min="0" max="24">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
