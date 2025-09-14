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

        // <-- 2. TAMBAHKAN FUNGSI INI
    /**
     * Dapatkan URL lengkap untuk gambar berita.
     *
     * @return string|null
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            // Menggunakan Storage::url() untuk membuat URL yang benar
            // Ini akan menghasilkan http://.../storage/namafile.jpg
            return Storage::url($this->gambar);
        }
        
        // Kembalikan null jika tidak ada gambar
        return null;
    }
}