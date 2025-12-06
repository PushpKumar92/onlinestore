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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            
            // Billing information
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->text('billing_address');
            $table->string('billing_country');
            $table->string('billing_city');
            $table->string('billing_zip');
            
            // Payment information
            $table->string('payment_method');
            $table->decimal('total_amount', 10, 2);
            
            // Order status
            $table->enum('status', [
                'pending', 
                'confirmed', 
                'processing', 
                'shipped', 
                'delivered', 
                'cancelled', 
                'refunded'
            ])->default('pending');
            
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index('user_id');
            $table->index('order_number');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};