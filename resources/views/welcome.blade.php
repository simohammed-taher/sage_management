<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAGE Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to top, rgb(40, 110, 52), rgb(31, 30, 30));
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;

            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            background-color: #343a40;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header h1 {
            color: #ffffff;
            font-size: 48px;
            margin: 0;
        }

        .container {
            margin-top: 60px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
            transition: all 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.12);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .btn-custom {
            background-color: #202f07;
            border: 2px solid #64e02b;
            color: #64e02b;
            font-weight: bold;
            padding: 12px 24px;
            margin: 5px;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            background-color: #64e02b;
            border-color: #3e2929;
            color: #3e2929;
        }

        #tit2 {
            text-align: center;
            font-family: Verdana, Geneva, Tahoma, sans-serif
        }
    </style>
</head>

<body>
    <div class="header">
        <h1 id="tit2">Développement d‘une application web de gestion de Ressources Humaines</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Employees</h2>
                        <a href="{{ route('employees.index') }}" class="btn btn-custom">Go to Employees</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Salaries</h2>
                        <a href="{{ route('salaries.index') }}" class="btn btn-custom">Go to Salaries</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Leaves</h2>
                        <a href="{{ route('leaves.index') }}" class="btn btn-custom">Go to Leaves</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Clients</h2>
                        <a href="{{ route('clients.index') }}" class="btn btn-custom">Go to Leaves</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Project</h2>
                        <a href="{{ route('projects.index') }}" class="btn btn-custom">Go to Leaves</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Tasks</h2>
                        <a href="{{ route('tasks.index') }}" class="btn btn-custom">Go to Leaves</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 15px ">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage plannings</h2>
                        <a href="{{ route('plannings.index') }}" class="btn btn-custom">Go to Leaves</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 15px">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage timesheets</h2>
                        <a href="{{ route('timesheets.index') }}" class="btn btn-custom">Go to Leaves</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>


</body>

</html>
