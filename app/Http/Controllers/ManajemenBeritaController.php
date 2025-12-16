<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ManajemenBeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        $kategories = Berita::distinct()->pluck('kategori')->toArray();
        
        if (empty($kategories)) {
            $kategories = ['Infrastruktur', 'Kesehatan', 'Budaya', 'Teknologi', 'Administrasi'];
        }
        
        return view('admins.manajemen-berita.index', compact('beritas', 'kategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = Str::slug($request->judul) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $fileName);
            $data['gambar'] = $fileName;
        }

        Berita::create($data);

        return response()->json(['success' => 'Berita berhasil ditambahkan!']);
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return response()->json($berita);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $berita = Berita::findOrFail($id);
        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && file_exists(public_path('images/berita/' . $berita->gambar))) {
                unlink(public_path('images/berita/' . $berita->gambar));
            }

            $file = $request->file('gambar');
            $fileName = Str::slug($request->judul) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/berita'), $fileName);
            $data['gambar'] = $fileName;
        }

        $berita->update($data);

        return response()->json(['success' => 'Berita berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        if ($berita->gambar && file_exists(public_path('images/berita/' . $berita->gambar))) {
            unlink(public_path('images/berita/' . $berita->gambar));
        }
        
        $berita->delete();

        return response()->json(['success' => 'Berita berhasil dihapus!']);
    }
}