@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Add Employee</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card border-0 shadow-lg">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" placeholder="Enter Name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" placeholder="Enter Email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <input name="position" id="position" placeholder="Enter position"
                                            class="form-control">{{ old('position') }}
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label"></label>
                                        <input type="file" name="image" id="image"
                                            class="@error('image') is-invalid @enderror">

                                        @error('image')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <button class="btn btn-primary mt-3">
                                <i class="fas fa-save"></i> Save Employee
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
