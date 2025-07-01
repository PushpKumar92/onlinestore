<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('vendors', function (Blueprint $table) {
        $table->id();
        $table->string('name');             // Vendor's full name
        $table->string('email')->unique();  // Email (unique)
        $table->string('mobile');           // Mobile number
        $table->string('address');          // Address
        $table->string('shop_name');        // Shop name
        $table->string('shop_url');         // Shop URL (could also be unique if needed)
        $table->string('password');         // Hashed password
        $table->boolean('is_approved')->default(false); // Admin approval
        $table->timestamps();               // created_at & updated_at
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
