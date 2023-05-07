@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Plannings</h1>
        <a href="{{ route('plannings.create') }}" class="btn btn-primary">Add New Planning</a>
        <br><br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>Task</th>
                    <th>Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plannings as $planning)
                    <tr>
                        <td>{{ $planning->id }}</td>
                        {{-- <td>{{ $planning->employee->name }}</td> --}}
                        <td>{{ $planning->task->name }}</td>
                        <td>
                            Mon: {{ $planning->mon }}<br>
                            Tue: {{ $planning->tue }}<br>
                            Wed: {{ $planning->wed }}<br>
                            Thu: {{ $planning->thu }}<br>
                            Fri: {{ $planning->fri }}<br>
                            Sat: {{ $planning->sat }}<br>
                            Sun: {{ $planning->sun }}
                        </td>
                        <td>
                            <a href="{{ route('plannings.show', $planning->id) }}" class="btn btn-info">View</a>
                        </td>
                        <td><a href="{{ route('plannings.edit', $planning->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('plannings.destroy', $planning->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </td>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
