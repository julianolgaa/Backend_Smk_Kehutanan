<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

     protected $table = 'berita'; // Nama tabel yang sebenarnya di database

    // Tambahkan ini
    protected $fillable = [
        'judul',
        'konten',
        'gambar',
    ];
}