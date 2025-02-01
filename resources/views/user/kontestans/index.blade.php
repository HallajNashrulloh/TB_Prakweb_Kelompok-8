@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <h1 class="text-4xl text-center font-bold text-blue-600 mb-4">Pemilihan Ketua Kelas</h1>
    <h3 class="text-xl text-center text-gray-700 mb-6">Pemilihan Ketua Kelas A | ITG 2025</h3>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg shadow-md">
            {{ session('error') }}
        </div>
    @endif

    <!-- Kontestan Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($kontestans as $kontestan)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white text-center py-4">
                    <h5 class="text-xl font-semibold">Nomor {{ $loop->iteration }}</h5>
                </div>
                <div class="p-6 text-center">
                    @if($kontestan->image)
                        <img src="{{ asset('storage/' . $kontestan->image) }}" 
                             alt="Foto {{ $kontestan->nama }}" 
                             class="w-32 h-32 mx-auto rounded-full border-4 border-blue-500 shadow-lg mb-4">
                    @else
                        <span class="text-gray-500 italic">Tidak ada gambar</span>
                    @endif

                    <h5 class="text-lg font-semibold text-gray-800">{{ $kontestan->nama }}</h5>
                    <p class="text-sm text-gray-600">Tahun: {{ $kontestan->tahun }}</p>

                    <!-- Visi dan Misi Section -->
                    <div class="mt-4">
                        <h6 class="text-purple-800 font-semibold">Visi:</h6>
                        <p class="text-sm text-gray-600">{{ $kontestan->visi ?? 'Visi belum diisi' }}</p>

                        <h6 class="text-gray-800 font-semibold mt-2">Misi:</h6>
                        <p class="text-sm text-gray-600">{{ $kontestan->misi ?? 'Misi belum diisi' }}</p>
                    </div>
                </div>
                <div class="bg-gray-100 px-6 py-4 text-center">
                @auth
    @php
        // Cek apakah user sudah memberikan suara
        $hasVoted = \App\Models\Vote::where('user_id', auth()->id())->exists();
    @endphp

    @if($hasVoted)
        <button disabled 
                class="bg-gray-400 text-green py-2 px-4 rounded-lg cursor-not-allowed">
            Anda sudah memberikan suara
        </button>
    @else
        <form action="{{ route('kontestans.vote', $kontestan->id) }}" method="POST">
            @csrf
            <button type="submit" 
                    class="bg-gradient-to-r from-green-400 to-green-500 text-white py-2 px-4 rounded-lg hover:from-green-500 hover:to-green-600 transition duration-300">
                <i class="bi bi-hand-thumbs-up"></i> Berikan Suara
            </button>
        </form>
    @endif
@else
    <p class="text-sm text-gray-500">Silakan login untuk memberikan suara.</p>
@endauth

                </div>
            </div>
        @empty
            <div class="col-span-3 text-center">
                <p class="text-gray-500">Tidak ada kontestan</p>
            </div>
        @endforelse
    </div>

    <!-- Paginasi -->
    <div class="mt-8 flex justify-center">
        {{ $kontestans->links('pagination::tailwind') }}
    </div>
</div>
@endsection
