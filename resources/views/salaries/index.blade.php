@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                {{-- <div class="d-flex justify-content-between align-items-center"> --}}
                <h1 class="mb-4">Salaries</h1>
                <a href="{{ route('salaries.create') }}" class="btn btn-primary">Add Salary</a>
                {{-- </div> --}}
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Amount</th>
                            <th>Pay Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salaries as $salary)
                            <tr>
                                <td>{{ $salary->employee->name }}</td>
                                <td>{{ $salary->amount }}</td>
                                <td>{{ $salary->pay_date }}</td>
                                <td>
                                    <a href="{{ route('salaries.edit', $salary->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
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
                {{ $salaries->links() }}
            </div>
        </div>
    </div>
@endsection
