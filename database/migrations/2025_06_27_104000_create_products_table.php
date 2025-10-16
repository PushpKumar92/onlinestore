<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ensure 'categories' table exists before creating 'products'
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id(); // unsigned BIGINT
                $table->string('name');
                $table->timestamps();
            });
        }

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id'); // must match categories.id

            $table->string('name');
            $table->string('sku_code')->unique();
            $table->string('brand')->nullable();
            $table->string('color')->nullable();
            $table->string('sizes')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->string('image')->nullable();
            $table->boolean('is_approved')->default(false);

            $table->unsignedBigInteger('added_by')->nullable();
            $table->enum('added_by_role', ['admin', 'vendor'])->default('admin');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            // ✅ Foreign key safely defined
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
