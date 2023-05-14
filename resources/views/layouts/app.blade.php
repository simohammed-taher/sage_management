<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Sage')</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        /* .sidebar {
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
        } */

        #img {
            max-width: 25%;
        }

        #title {
            position: relative;
            right: 31%;
            font-weight: bold;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .nav-link-custom {
            color: #9ce2bc;
        }

        .nav-link-custom:hover {
            color: #007bff;
            text-decoration: none;
        }

        .navbar-custom {
            background-color: #34495e;
        }

        .navbar-brand-custom {
            color: #f1c40f;
            font-weight: bold;
        }

        .navbar-brand-custom:hover {
            color: #f1c40f;
            text-decoration: none;
        }

        .navbar-toggler-custom {
            border-color: #f1c40f;
        }

        .navbar-toggler-custom:focus {
            outline-color: #f1c40f;
        }

        .navbar-toggler-icon-custom {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(241,196,15, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .sidebar-custom {
            min-width: 250px;
            max-width: 250px;
            height: 92vh;
            background-color: #133d67;
            padding-top: 1rem;
        }

        .sidebar-custom a {
            display: block;
            padding: 1rem;
            color: #ecf0f1;
            text-decoration: none;
        }

        .sidebar-custom a:hover {
            background-color: #34495e;
            color: #f1c40f;
        }

        .sidebar-custom .bi {
            margin-right: 0.5rem;
        }
    </style>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <header>
                <img src="https://onesolutions.ch/wp-content/uploads/2021/05/logo-Sage-2.png" alt=""
                    id="img">
            </header>
            <a class="navbar-brand navbar-brand-custom" href="#" id="title">
                Gestion SAGE
            </a>
            <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon navbar-toggler-icon-custom"></span>
            </button>
        </div>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('login') }}">
                        <i class="bi bi-door-open"></i> Connexion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('register') }}">
                        <i class="bi bi-person-plus-fill"></i> Inscription
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Déconnexion
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </ul>


    </nav>

    <div class="container-fluid mt-0">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar-custom">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index') }}">
                            <i class="bi bi-person"></i> Employés
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('salaries.index') }}">
                            <i class="bi bi-cash"></i> Salaires
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('leaves.index') }}">
                            <i class="bi bi-calendar-event"></i> Congés
                        </a>
                    </li>
                    {{-- party2 --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">
                            <i class="bi bi-people"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects.index') }}">
                            <i class="bi bi-briefcase"></i> Projets
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">
                            <i class="bi bi-check2-square"></i> Tâches
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('plannings.index') }}">
                            <i class="bi bi-calendar-check"></i> Planifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timesheets.index') }}">
                            <i class="bi bi-clock"></i> Feuilles de temps
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-lg-10">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/app.js') }}" defer></script>

</body>
