<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
     Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('category_id'); // ✅ Add this
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2);
    $table->decimal('discount', 10, 2)->default(0);
    $table->integer('quantity')->default(0);
    $table->string('image')->nullable();
    $table->boolean('is_approved')->default(false);
    $table->unsignedBigInteger('added_by');
    $table->enum('added_by_role', ['admin', 'vendor']);
    $table->timestamps();

    // Optional: Add foreign key constraint if you have a `categories` table
    // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};