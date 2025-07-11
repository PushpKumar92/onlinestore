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
 Schema::create('products', function (Blueprint $table) {
    $table->id();
     $table->unsignedBigInteger('category_id');
    $table->unsignedBigInteger('added_by_id'); // admin_id or vendor_id
    $table->enum('added_by_type', ['admin', 'vendor']);
    $table->string('name');
    $table->text('description')->nullable();
    $table->decimal('price', 10, 2);
    $table->string('discount')->nullable();
    $table->string('quantity')->default(0);
    $table->string('image')->nullable();
    $table->enum('status', ['pending', 'approved'])->default('pending');
    $table->timestamps();
});

   


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};