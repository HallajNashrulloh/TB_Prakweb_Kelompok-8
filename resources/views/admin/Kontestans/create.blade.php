@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-4xl font-extrabold text-center text-blue-600 mb-8">Tambah Kontestan</h1>

    <form action="{{ route('admin.kontestans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-8 rounded-lg shadow-lg">
        @csrf
        
        <!-- Nama -->
        <div>
            <label for="nama" class="block text-lg font-semibold text-gray-700 mb-2">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Masukkan nama kontestan" 
                   class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>

        <!-- Tahun -->
        <div>
            <label for="tahun" class="block text-lg font-semibold text-gray-700 mb-2">Tahun</label>
            <input type="text" name="tahun" id="tahun" placeholder="Masukkan tahun" 
                   class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
        </div>

        <!-- Gambar -->
        <div>
            <label for="image" class="block text-lg font-semibold text-gray-700 mb-2">Gambar</label>
            <input type="file" name="image" id="image" 
                   class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <!-- Visi -->
        <div>
            <label for="visi" class="block text-lg font-semibold text-gray-700 mb-2">Visi</label>
            <textarea name="visi" id="visi" rows="3" placeholder="Tuliskan visi kontestan" 
                      class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required></textarea>
        </div>

        <!-- Misi -->
        <div>
            <label for="misi" class="block text-lg font-semibold text-gray-700 mb-2">Misi</label>
            <textarea name="misi" id="misi" rows="5" placeholder="Tuliskan misi kontestan" 
                      class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required></textarea>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center">
            <button type="submit" 
                    class="bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-8 rounded-lg font-semibold shadow-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan
            </button>
            <a href="{{ route('admin.kontestans.index') }}" 
               class="py-3 px-8 text-gray-700 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
