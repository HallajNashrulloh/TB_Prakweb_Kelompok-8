<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Menu Admin') }}</title>

    <!-- Tailwind CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .sidebar {
            background: linear-gradient(180deg, #1E40AF,rgb(21, 22, 25));
        }
        .sidebar a {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .sidebar a:hover {
            background-color:rgb(34, 175, 21);
            color: #F1F5F9;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
<div class="sidebar w-64 h-screen text-white fixed">
    <div class="p-4 text-center font-extrabold text-2xl border-b border-gray-700">
        Menu Admin
    </div>
    <nav class="mt-4">
        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-sm font-medium hover:bg-blue-700">Menu Utama</a>
        <a href="{{ route('admin.kontestans.index') }}" class="block px-4 py-3 text-sm font-medium hover:bg-blue-700">Kontestan</a>
        <a href="{{ route('logout') }}" 
           class="block px-4 py-3 text-sm font-medium hover:bg-blue-700"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           Keluar
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </nav>
</div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6">
            @if (isset($header))
                <header class="bg-white shadow rounded-lg mb-6">
                    <div class="py-4 px-6">
                        <h1 class="text-xl font-semibold text-gray-700">{{ $header }}</h1>
                    </div>
                </header>
            @endif
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    @stack('scripts')
</body>
</html>
