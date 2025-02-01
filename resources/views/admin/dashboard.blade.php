@extends('layouts.admin') 

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')  
<body class="bg-light">  
    <div class="container py-5">  
        <!-- Welcome Section -->  
        <div class="card shadow-sm mb-5 border-0">  
            <div class="card-body bg-primary text-white rounded">  
                <div class="row align-items-center">  
                    <div class="col-md-8">  
                        <h1 class="display-4 fw-bold">Halo, {{ Auth::user()->name }}</h1>  
                        <p class="lead">Selamat datang di sistem administrasi kami.</p>  
                    </div>  
                </div>  
            </div>  
        </div>  

        <!-- Menu Section -->
<div class="row g-4">
    <!-- Kontestan Section -->
    <div class="col-md-6">
        <a href="{{ route('admin.kontestans.index') }}" class="text-decoration-none">
            <div class="card border-0 shadow-lg h-100">
                <div class="card-body text-center bg-info text-white rounded">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-card-list" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M3 4h10v2H3V4zm0 4h10v2H3V8zm0 4h10v2H3v-2z" />
                            <path fill-rule="evenodd" d="M14 3H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                        </svg>
                    </div>
                    <h5 class="card-title">Kontestan</h5>
                    <p class="card-text">Klik di sini untuk melihat semua kontestan yang terdaftar.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Tambah Kontestan Section -->
    <div class="col-md-6">
        <a href="{{ route('admin.kontestans.create') }}" class="text-decoration-none">
            <div class="card border-0 shadow-lg h-100">
                <div class="card-body text-center bg-info text-white rounded">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-plus-circle" width="48" height="48" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                        </svg>
                    </div>
                    <h5 class="card-title">Tambah Kontestan</h5>
                    <p class="card-text">Klik di sini untuk menambahkan kontestan baru.</p>
                </div>
            </div>
        </a>
    </div>
</div>
</body>
<div>
<canvas id="votingChart" width="400" height="200"></canvas>

<script>
    fetch("{{ route('admin.voting.data') }}")
        .then(response => response.json())
        .then(data => {
            const labels = data.map(kontestan => kontestan.nama);
            const votes = data.map(kontestan => kontestan.vote);

            const ctx = document.getElementById('votingChart').getContext('2d');
            const votingChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Suara',
                        data: votes,
                        backgroundColor: 'rgb(0, 38, 255)',
                        borderColor: 'rgb(0, 59, 251)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
</script>
</div>  
@endsection
