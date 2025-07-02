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
       Schema::create('vendors', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('mobile');
   $table->string('address')->nullable();
    $table->string('shop_name')->nullable(); // ← Add this
    $table->string('shop_url')->nullable(); // ← Add this
    $table->string('profile_image');
    $table->string('password');
    $table->boolean('is_approved')->default(false); // for admin approval
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};