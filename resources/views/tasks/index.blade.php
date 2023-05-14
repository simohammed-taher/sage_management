@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container mt-5">
        <h1>Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Add Task
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Name</th>
                    <th>Due Date</th>
                    <th>Completed</th>
                    <th>description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->project->name }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                        <th>{{ $task->description }}</th>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
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
@endsection
