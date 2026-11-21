<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('topik', function (Blueprint $table) {
            $table->id();                             
            $table->string('nama_topik', 150);
            $table->string('bidang_ilmu', 100);
            $table->string('kata_kunci', 200);
            $table->text('deskripsi');
            $table->timestamps();                     
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('topik');
    }
};
