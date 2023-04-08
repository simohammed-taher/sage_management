@extends('layouts.app')

@section('title', 'Edit Client')

@section('content')
    <div class="container mt-5">
        <h1>Edit Client</h1>
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Client Name"
                    value="{{ $client->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Client Email"
                    value="{{ $client->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Client Phone"
                    value="{{ $client->phone }}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Client Address">{{ $client->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Client</button>
        </form>
    </div>
@endsection
