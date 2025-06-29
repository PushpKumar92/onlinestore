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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->string('product_name')->nullable(); // optional snapshot
            $table->string('product_image')->nullable(); // snapshot
            $table->decimal('price', 10, 2)->nullable(); // snapshot
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
     public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};