<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Menu Voting') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7V6Um0rL5r1IDWf9OzJgyZJEmF4I0tfg8eu" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .sidebar {
            background: linear-gradient(135deg, #2b6cb0, #2c5282);
            color: white;
        }

        .sidebar-header {
            background-color: #2c5282;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }

        .sidebar nav {
            margin-top: 1rem;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar w-64 h-screen fixed">
            <div class="sidebar-header p-4 text-center font-bold text-2xl border-b border-gray-700">
                Menu Voting
            </div>
            <nav class="mt-4 px-2">
                <a href="{{ route('dashboard') }}" class="d-block px-3 py-2">Menu Utama</a>
                <a href="{{ route('user.kontestans.index') }}" class="d-block px-3 py-2">Kontestan</a>
                {{-- <a href="{{ route('profile.edit') }}" class="d-block px-3 py-2">Profile</a> --}}
                <a href="{{ route('logout') }}" 
                   class="d-block px-3 py-2"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-grow ms-64 p-6">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow rounded mb-6">
                    <div class="py-4 px-6">
                        <h1 class="text-lg font-bold text-gray-700">{{ $header }}</h1>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
