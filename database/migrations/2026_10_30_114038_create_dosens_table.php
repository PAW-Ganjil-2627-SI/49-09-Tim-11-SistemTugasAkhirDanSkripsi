<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nidn', 13)->unique();
            $table->string('nama', 100);
            $table->string('jabatan', 50);
            $table->string('kepakaran', 150);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
