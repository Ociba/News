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
        Schema::create('photos_on_sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_with_watermark');
            $table->string('image_without_watermark');
            $table->decimal('price', 10, 2); // Changed from 'amount' to 'price'
            $table->enum('license_type', ['standard', 'extended', 'exclusive'])->default('standard');
            $table->enum('status', ['draft', 'publish', 'archive'])->default('publish');
            $table->unsignedInteger('download_count')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos_on_sells');
    }
};
