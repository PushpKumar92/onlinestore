<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
       Schema::create('vendors', function (Blueprint $table) {
    $table->id(); // unsignedBigInteger
    $table->string('name');
    $table->string('email')->unique();
    $table->string('mobile');
    $table->string('address')->nullable();
    $table->string('shop_name')->nullable();
    $table->string('shop_url')->nullable();
    $table->string('profile_image')->nullable();
    $table->string('password');
    $table->boolean('is_approved')->default(false);
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};