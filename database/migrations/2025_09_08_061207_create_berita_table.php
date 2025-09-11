<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
   {
    Schema::create('berita', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('konten');
        $table->string('gambar')->nullable(); // nullable berarti boleh kosong
        $table->timestamps(); // otomatis membuat kolom created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
