<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_berita' => $this->id, 
            'judul' => $this->judul,
            'isi' => $this->konten, // DIUBAH: dari $this->isi menjadi $this->konten agar sesuai dengan Model
            'gambar_url' => $this->gambar_url, // <-- 3. GUNAKAN ACCESSOR UNTUK URL GAMBAR
            'tanggal_dibuat' => $this->created_at->format('d F Y'),
        ];
    }
}

