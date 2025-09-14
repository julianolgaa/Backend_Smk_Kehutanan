<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Resources\BeritaResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Menampilkan semua data berita.
     * Endpoint: GET /api/berita
     */
    public function index()
    {
        $semuaBerita = Berita::latest()->paginate(10); // Ambil berita terbaru, 10 per halaman
        return BeritaResource::collection($semuaBerita);
    }

    /**
     * Menyimpan berita baru ke database.
     * Endpoint: POST /api/berita
     */
    public function store(Request $request)
    {
        // Validasi input dari user
        $validator = Validator::make($request->all(), [
            'judul'     => 'required|string|max:255',
            'konten'    => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Gambar opsional, maks 2MB
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Handle upload gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('public');
        }

        // Buat berita baru
        $berita = Berita::create([
            'judul'     => $request->judul,
            'konten'    => $request->konten,
            'gambar'    => $gambarPath
        ]);

        // Kembalikan response sukses dengan data berita yang baru dibuat
        return new BeritaResource($berita);
    }

    /**
     * Menampilkan satu data berita spesifik.
     * Endpoint: GET /api/berita/{id}
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return new BeritaResource($berita);
    }

    /**
     * Memperbarui data berita di database.
     * Endpoint: POST /api/berita/{id} (Gunakan POST untuk mengakomodasi form-data/gambar)
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul'     => 'required|string|max:255',
            'konten'    => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Handle gambar baru jika diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                Storage::delete($berita->gambar);
            }
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('public');
            $berita->update(['gambar' => $gambarPath]);
        }
        
        // Update judul dan konten
        $berita->update([
            'judul'     => $request->judul,
            'konten'    => $request->konten,
        ]);

        return new BeritaResource($berita);
    }

    /**
     * Menghapus data berita dari database.
     * Endpoint: DELETE /api/berita/{id}
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($berita->gambar) {
            Storage::delete($berita->gambar);
        }

        // Hapus data dari database
        $berita->delete();

        // Kembalikan response tanpa konten (sukses)
        return response()->json(['message' => 'Berita berhasil dihapus.']);
    }
}
