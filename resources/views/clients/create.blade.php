@extends('layouts.app')

@section('title', 'Add Client')

@section('content')
    <div class="container mt-5">
        <h1>Add Client</h1>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Client Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Client Email"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Client Phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Client Address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Client</button>
        </form>
    </div>
@endsection
