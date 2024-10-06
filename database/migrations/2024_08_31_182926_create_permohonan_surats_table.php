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
        Schema::create('permohonan_surats', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("alamat");
            $table->string("email");
            $table->string("jenis_surat");
            $table->string("status")->default("Dalam proses");
            $table->date("tanggal_lahir"); // Kolom untuk tanggal lahir
            $table->enum("jenis_kelamin", ['Laki-laki', 'Perempuan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_surats');
    }
};
