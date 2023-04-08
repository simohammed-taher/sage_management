@extends('layouts.app')

@section('content')
    <h1>Planning Details</h1>
    <table class="table table-bordered">
        <tr>
            <th>Employee</th>
            <td>{{ $planning->employee->name }}</td>
        </tr>
        <tr>
            <th>Task</th>
            <td>{{ $planning->task->name }}</td>
        </tr>
        <tr>
            <th>Monday</th>
            <td>{{ $planning->mon }} hours</td>
        </tr>
        <tr>
            <th>Tuesday</th>
            <td>{{ $planning->tue }} hours</td>
        </tr>
        <tr>
            <th>Wednesday</th>
            <td>{{ $planning->wed }} hours</td>
        </tr>
        <tr>
            <th>Thursday</th>
            <td>{{ $planning->thu }} hours</td>
        </tr>
        <tr>
            <th>Friday</th>
            <td>{{ $planning->fri }} hours</td>
        </tr>
        <tr>
            <th>Saturday</th>
            <td>{{ $planning->sat }} hours</td>
        </tr>
        <tr>
            <th>Sunday</th>
            <td>{{ $planning->sun }} hours</td>
        </tr>
    </table>
    <a href="{{ route('plannings.edit', $planning->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('plannings.destroy', $planning->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this planning?')">Delete</button>
    </form>
    <a href="{{ route('plannings.index') }}" class="btn btn-secondary">Back to Plannings</a>
@endsection
