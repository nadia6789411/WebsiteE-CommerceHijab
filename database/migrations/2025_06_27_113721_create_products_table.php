<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique(); // Untuk URL ramah SEO
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2); // Harga dengan 2 angka di belakang koma
            $table->integer('stock')->default(0);
            $table->string('image')->nullable(); // Path gambar produk
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};