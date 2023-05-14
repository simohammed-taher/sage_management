@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Timesheets
                        <a href="{{ route('timesheets.create') }}" class="btn btn-primary float-end">
                            <i class="fas fa-plus"></i> Add Timesheet
                        </a>
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
                                    {{-- <th>ID</th> --}}
                                    <th>Day</th>
                                    <th>Attendance</th>
                                    <th>matricule</th>
                                    <th>Task ID</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timesheets as $timesheet)
                                    <tr>
                                        {{-- <td>{{ $timesheet->id }}</td> --}}
                                        <td>{{ $timesheet->day }}</td>
                                        <td>{{ $timesheet->attendance ? 'Present' : 'Absent' }}</td>
                                        <td>{{ $timesheet->matricule }}</td>

                                        <td>{{ $timesheet->task_id }}</td>
                                        <td>
                                            <a href="{{ route('timesheets.edit', $timesheet->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
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
