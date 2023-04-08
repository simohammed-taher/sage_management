<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sage')</title>
    <link rel="icon" href="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 1rem;
        }

        .sidebar a {
            display: block;
            padding: 1rem;
            color: #000;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #e9ecef;
            color: #000;
        }

        #img {
            max-width: 25%;
        }

        #title {
            position: relative;
            right: 31%;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-success ">
        <div class="container">
            <header><img src="https://onesolutions.ch/wp-content/uploads/2021/05/logo-Sage-2.png" alt=""
                    id="img"></header>
            <a class="navbar-brand" href="#" id="title">SAGE Management
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </ul>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <ul class="nav flex-column">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('salaries.index') }}">Salaries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leaves.index') }}">Leaves</a>
                    </li>
                    {{-- party2 --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects.index') }}">projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">tasks</a>
                    </li>
                    <!-- Add more sidebar links here -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('plannings.index') }}">plannings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timesheets.index') }}">timesheets</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-lg-10">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>