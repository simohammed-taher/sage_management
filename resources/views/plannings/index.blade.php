@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                {{-- <h1 class="mb-4">Plannings</h1> --}}
                <a href="{{ route('plannings.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Planning
                </a>
                <br><br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            {{-- <th>Task</th> --}}
                            <th>Days</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plannings as $planning)
                            <tr>
                                <td>{{ $planning->id }}</td>
                                <td>{{ $planning->task->name }}</td>
                                <td>
                                    lundi: {{ $planning->mon }}:heure<br>
                                    mardi: {{ $planning->tue }}:heure<br>
                                    mercredi: {{ $planning->wed }}:heure<br>
                                    jeudi: {{ $planning->thu }}:heure<br>
                                    vendredi: {{ $planning->fri }}:heure<br>
                                    samedi: {{ $planning->sat }}:heure<br>
                                    dimanche: {{ $planning->sun }}:heure
                                </td>
                                <td>
                                    <a href="{{ route('plannings.show', $planning->id) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('plannings.edit', $planning->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('plannings.destroy', $planning->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                </td>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endsection
