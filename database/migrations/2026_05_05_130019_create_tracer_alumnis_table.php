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
        Schema::create('tracer_alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->year('angkatan');
            $table->string('pekerjaan_kuliah');
            $table->enum('status', ['kerja', 'kuliah', 'wirausaha']);
            $table->text('detail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer_alumnis');
    }
};
