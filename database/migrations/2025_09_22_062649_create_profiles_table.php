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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah','100');
            $table->string('alamat','150');
            $table->string('kepala_sekolah','50');
            $table->text('visi_misi');
            $table->string('logo','100')->nullable();
            $table->string('foto','100')->nullable();
            $table->string('npsn','10')->unique();
            $table->string('kontak','15');
            $table->year('tahun_berdiri','4');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
