<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }

        body {
            font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .btn-primary:hover {
            background-color: #34495e;
            border-color: #34495e;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 8px;
            width: 200px;
        }

        .search-input:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .search-btn {
            margin-left: 10px;
        }

        .search-form .input-group {
            width: 100%;
        }

        .search-form .form-control {
            border-right: none;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .search-form .btn-outline-success {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>

<body class="bg-gray-200 font-sans leading-normal tracking-normal">
    @extends('layouts.app')

    @section('content')
        <div class="container mx-auto mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-4 text-xl">Employees</h1>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-user-plus"></i> Add Employee
                    </a>
                    <div class="d-flex justify-content-end">
                        <form method="GET" action="{{ route('employees.index') }}"
                            class="form-inline my-2 my-lg-0 search-form">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" placeholder="Rechercher par nom"
                                    aria-label="Search by name" aria-describedby="button-addon2"
                                    value="{{ request()->query('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit" id="button-addon2">
                                        <i class="fas fa-search"></i> Rechercher
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table id="tbl_exporttable_to_xls" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($message = session('success'))
                                <script type="text/javascript">
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    })

                                    Toast.fire({
                                        icon: 'success',
                                        title: '{{ $message }}'
                                    })
                                </script>
                            @endif
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>
                                        <img src="{{ str_starts_with($employee->image, 'https') ? $employee->image : url('uploads/employees/' . $employee->image) }}"
                                            alt="Employee Image" width="40" height="40" class="rounded-full" />
                                    </td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->position }}</td>
                                    <td>
                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick=" return confirmDelete()">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-center">

                        <button onclick="ExportToExcel('xlsx')"
                            class="bg-gradient-to-r from-green-500 to-green-700 hover:from-green-700 hover:to-green-500 text-white font-bold py-2 px-4 rounded">
                            Export table to excel
                        </button>

                    </div>

                    <div class="mt-3">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function confirmDelete() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            }

            function ExportToExcel(type, fn, dl) {
                var elt = document.getElementById('tbl_exporttable_to_xls');
                var wb = XLSX.utils.table_to_book(elt, {
                    sheet: "sheet1"
                });
                return dl ?
                    XLSX.write(wb, {
                        bookType: type,
                        bookSST: true,
                        type: 'base64'
                    }) :
                    XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
            }
        </script>
    @endsection
</body>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</html>
