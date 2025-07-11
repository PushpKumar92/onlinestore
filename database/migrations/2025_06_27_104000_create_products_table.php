<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
      Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2);
    $table->decimal('discount', 5, 2)->default(0); // Add this line
    $table->string('image')->nullable();
    $table->boolean('is_approved')->default(false);
    $table->enum('added_by', ['admin', 'vendor']);
    
    $table->unsignedBigInteger('admin_id')->nullable();
    $table->unsignedBigInteger('vendor_id')->nullable();
    $table->timestamps();
});
    }

    public function down(): void
    {
    
        Schema::dropIfExists('products');
    }
};