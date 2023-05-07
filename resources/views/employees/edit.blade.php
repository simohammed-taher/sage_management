@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Edit Employee</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employees.update', $employee->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card border-0 shadow-lg">
                                <div class="card-body">
                                    <form action="{{ route('employees.update', $employee->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="card border-0 shadow-lg">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" name="name" id="name"
                                                        placeholder="Enter Name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{ old('name', $employee->name) }}">
                                                    @error('name')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" name="email" id="email"
                                                        placeholder="Enter Email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email', $employee->email) }}">
                                                    @error('email')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="position" class="form-label">Position:</label>
                                                    <input type="text" name="position" id="position"
                                                        value="{{ $employee->position }}" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image" class="form-label"></label>
                                                    <input type="file" name="image" id="image"
                                                        class="@error('image') is-invalid @enderror">

                                                    @error('image')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror

                                                    <div class="pt-3">
                                                        @if ($employee->image != '' && file_exists(public_path() . '/uploads/employees/' . $employee->image))
                                                            <img src="{{ url('uploads/employees/' . $employee->image) }}"
                                                                alt="" width="100" height="100">
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                </div>

                                <button class="btn btn-primary my-3">
                                    <i class="fas fa-save"></i> Update Employee
                                </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
