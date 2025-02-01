<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Kontestan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KontestanController extends Controller
{
    public function adminIndex()
    {
        $kontestans = Kontestan::orderBy('tahun', 'desc')->paginate(10);
        return view('admin.kontestans.index', compact('kontestans'));
    }

    public function create()
    {
        return view('admin.kontestans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4|integer',
            'nama' => 'required|string|max:255|unique:kontestans,nama',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',
        ]);

        // Proses penyimpanan gambar di public/storage/kontestans
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/kontestans'), $fileName);
            $imagePath = 'kontestans/' . $fileName; // Simpan path gambar relatif
        }

        // Simpan data ke database
        Kontestan::create([
            'tahun' => $request->tahun,
            'nama' => $request->nama,
            'image' => $imagePath, // Simpan path gambar
            'visi' => $request->visi,
            'misi' => $request->misi,
            'vote' => 0,
        ]);

        return redirect()->route('admin.kontestans.index')->with('success', 'Kontestan berhasil ditambahkan!');
    }

    public function edit(Kontestan $kontestan)
    {
        return view('admin.kontestans.edit', compact('kontestan'));
    }

    public function update(Request $request, Kontestan $kontestan)
    {
        $request->validate([
            'tahun' => 'required|digits:4|integer',
            'nama' => 'required|string|max:255|unique:kontestans,nama,' . $kontestan->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visi' => 'required|string|max:1000',
            'misi' => 'required|string|max:1000',
        ]);

        // Proses penyimpanan gambar di public/storage/kontestans
        $imagePath = $kontestan->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($kontestan->image && file_exists(public_path('storage/' . $kontestan->image))) {
                unlink(public_path('storage/' . $kontestan->image));
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/kontestans'), $fileName);
            $imagePath = 'kontestans/' . $fileName; // Simpan path gambar relatif
        }

        $kontestan->update([
            'tahun' => $request->tahun,
            'nama' => $request->nama,
            'image' => $imagePath,
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('admin.kontestans.index')->with('success', 'Kontestan berhasil diperbarui!');
    }

    public function destroy(Kontestan $kontestan)
    {
        // Hapus gambar jika ada
        if ($kontestan->image && file_exists(public_path('storage/' . $kontestan->image))) {
            unlink(public_path('storage/' . $kontestan->image));
        }

        // Hapus data dari database
        $kontestan->delete();

        return redirect()->route('admin.kontestans.index')->with('success', 'Kontestan berhasil dihapus!');
    }

    public function userIndex()
    {
        $kontestans = Kontestan::orderBy('tahun', 'desc')->paginate(10);
        return view('user.kontestans.index', compact('kontestans'));
    }

    public function vote(Kontestan $kontestan)
    {
        // Periksa apakah user sudah memberikan suara
        if (Vote::where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'Anda hanya dapat memberikan suara satu kali.');
        }

        // Simpan data suara
        Vote::create([
            'user_id' => auth()->id(),
            'kontestan_id' => $kontestan->id,
        ]);

        // Tambahkan jumlah suara ke kontestan
        $kontestan->increment('vote');

        return redirect()->back()->with('success', 'Terima kasih sudah memberikan suara!');
    }

    public function getVotingData()

    {

        $kontestans = Kontestan::all();

        return response()->json($kontestans);

    }


    public function votingChart()

    {

        return view('admin.kontestans.voting');

    }
    
}
