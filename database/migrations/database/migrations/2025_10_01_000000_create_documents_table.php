<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('stored_name');      // nombre en disco
            $table->string('disk')->default('local');
            $table->string('path');             // ej: documents/abc123.pdf
            $table->string('mime')->nullable();
            $table->unsignedBigInteger('size')->nullable(); // bytes
            $table->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
