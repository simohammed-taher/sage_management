@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Planning</h1>
        <form action="{{ route('plannings.update', $planning->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select class="form-control" name="employee_id" id="employee_id">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $planning->employee_id == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="task_id">Task</label>
                <select class="form-control" name="task_id" id="task_id">
                    @foreach ($tasks as $task)
                        <option value="{{ $task->id }}" {{ $planning->task_id == $task->id ? 'selected' : '' }}>
                            {{ $task->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="mon">Monday</label>
                <input type="number" class="form-control" name="mon" id="mon" min="0" max="24"
                    value="{{ $planning->mon }}">
            </div>
            <div class="form-group">
                <label for="tue">Tuesday</label>
                <input type="number" class="form-control" name="tue" id="tue" min="0" max="24"
                    value="{{ $planning->tue }}">
            </div>
            <div class="form-group">
                <label for="wed">Wednesday</label>
                <input type="number" class="form-control" name="wed" id="wed" min="0" max="24"
                    value="{{ $planning->wed }}">
            </div>
            <div class="form-group">
                <label for="thu">Thursday</label>
                <input type="number" class="form-control" name="thu" id="thu" min="0" max="24"
                    value="{{ $planning->thu }}">
            </div>
            <div class="form-group">
                <label for="fri">Friday</label>
                <input type="number" class="form-control" name="fri" id="fri" min="0" max="24"
                    value="{{ $planning->fri }}">
            </div>
            <div class="form-group">
                <label for="sat">Saturday</label>
                <input type="number" class="form-control" name="sat" id="sat" min="0" max="24"
                    value="{{ $planning->sat }}">
            </div>
            <div class="form-group">
                <label for="sun">Sunday</label>
                <input type="number" class="form-control" name="sun" id="sun" min="0" max="24"
                    value="{{ $planning->sun }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
