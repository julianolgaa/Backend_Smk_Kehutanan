<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController; // Pastikan controller di-import

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini Anda mendaftarkan rute API untuk aplikasi Anda. Rute-rute ini
| dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "api".
|
*/

// Rute untuk otentikasi (biarkan seperti ini)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --- LANGKAH DIAGNOSA: TAMBAHKAN RUTE INI UNTUK TES ---
// Rute ini hanya untuk memastikan file ini dibaca oleh server.
Route::get('/test', function () {
    return response()->json(['pesan' => 'Rute Tes Berhasil!']);
});


// --- INI SATU-SATUNYA BARIS YANG ANDA BUTUHKAN UNTUK BERITA ---
// Baris ini secara otomatis membuat semua rute CRUD:
// GET /api/berita         (untuk menampilkan semua berita)
// GET /api/berita/{id}    (untuk menampilkan satu berita)
// POST /api/berita        (untuk membuat berita baru)
// PUT/PATCH /api/berita/{id} (untuk mengedit berita)
// DELETE /api/berita/{id} (untuk menghapus berita)
Route::apiResource('berita', BeritaController::class);