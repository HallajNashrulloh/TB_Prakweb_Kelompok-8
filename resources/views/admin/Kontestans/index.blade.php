@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Daftar Kontestan</h1>

    <!-- Tombol Tambah Kontestan -->
    <div class="mb-6 text-right">
        <a href="{{ route('admin.kontestans.create') }}" 
           class="bg-gradient-to-r from-blue-500 to-blue-600 text-white py-2 px-6 rounded-lg hover:from-blue-600 hover:to-blue-700 shadow-lg focus:outline-none transition duration-200">
            Tambah Kontestan
        </a>
    </div>

    <!-- Flash Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-500 text-green-800 p-4 rounded-lg mb-6 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Kontestan -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table id="table" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tahun</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Suara</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Visi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Misi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300">
                @forelse($kontestans as $kontestan)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $kontestan->nama }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $kontestan->tahun }}</td>
                        <td class="px-6 py-4">
                            @if($kontestan->image)
                                <img src="{{ asset('storage/' . $kontestan->image) }}" 
                                     alt="Gambar {{ $kontestan->nama }}" 
                                     class="h-20 w-20 object-cover rounded-lg shadow">
                            @else
                                <span class="text-gray-500 italic">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $kontestan->vote }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">{{ $kontestan->visi }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 truncate max-w-xs">{{ $kontestan->misi }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('admin.kontestans.edit', $kontestan->id) }}" 
                               class="bg-yellow-500 text-white py-1 px-4 rounded-lg hover:bg-yellow-600 transition duration-200 shadow-md">
                                Edit
                            </a>
                            <form action="{{ route('admin.kontestans.destroy', $kontestan->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white py-1 px-4 rounded-lg hover:bg-red-600 transition duration-200 shadow-md">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center px-6 py-4 text-gray-500">
                            Tidak ada kontestan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')  
    <script>  
        $(document).ready(function() {
            $('#table').DataTable({
                dom: "<'row'<'col-md-6'l><'col-md-6'f>>" +
                     "<'row'<'col-md-12'tr>>" +
                     "<'row'<'col-md-5'i><'col-md-7'p>>B",
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    zeroRecords: "Data tidak ditemukan",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Berikutnya",
                        previous: "Sebelumnya"
                    }
                }
            });
        });
    </script>  
@endpush
