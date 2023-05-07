@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.16/tailwind.min.css" />

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #4B5563;
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding: 12px 0;
            border-bottom: none;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 25px;
        }

        .btn-primary {
            background-color: #2563EB;
            border-color: #2563EB;
            font-weight: bold;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #1E40AF;
            border-color: #1E40AF;
        }

        .text-center a {
            color: #2563EB;
            font-size: 14px;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>

    <body>
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-full lg:w-1/3">
                    <div class="card mt-5">
                        <div class="card-header">{{ __('Login') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email"
                                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <div class="text-red-500 text-xs mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password"
                                        class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                                        name="password" required autocomplete="current-password">
                                    @error('password')
                                        <div class="text-red-500 text-xs mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 flex items-center">
                                    <input class="mr-2" type="checkbox"
                                        name="remember
                                    " id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-700" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary w-full">{{ __('Login') }}</button>
                                </div>

                                @if (Route::has('password.request'))
                                    <div class="text-center mt-3">
                                        <a href="{{ route('password.request') }}"
                                            class="text-blue-600 text-sm hover:underline">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
