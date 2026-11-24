<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique();
            $table->string('nama', 255);
            $table->integer('angkatan');
            $table->integer('sks_lulus')->default(0);
            $table->enum('status', ['Aktif', 'Cuti', 'Lulus'])->default('Aktif');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
