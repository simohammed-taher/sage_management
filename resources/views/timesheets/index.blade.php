<!-- resources/views/timesheets/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Timesheets
                        <a href="{{ route('timesheets.create') }}" class="btn btn-primary float-end">Add Timesheet</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Day</th>
                                    <th>Attendance</th>
                                    <th>Employee ID</th>
                                    <th>Task ID</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timesheets as $timesheet)
                                    <tr>
                                        <td>{{ $timesheet->id }}</td>
                                        <td>{{ $timesheet->day }}</td>
                                        <td>{{ $timesheet->attendance ? 'Present' : 'Absent' }}</td>
                                        <td>{{ $timesheet->employee_id }}</td>
                                        <td>{{ $timesheet->task_id }}</td>
                                        <td>
                                            <a href="{{ route('timesheets.edit', $timesheet->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
