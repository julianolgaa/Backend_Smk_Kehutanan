<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Berita; // Import Model Berita

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ini adalah endpoint API untuk mengambil semua berita
Route::get('/berita', function () {
    return Berita::all(); // Mengambil semua data dari tabel berita
});

// Ini adalah endpoint API untuk mengambil satu berita berdasarkan ID
Route::get('/berita/{id}', function ($id) {
    return Berita::find($id); // Mengambil data berita berdasarkan ID
});