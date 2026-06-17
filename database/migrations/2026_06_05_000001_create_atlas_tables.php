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
        // 1. Products Table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // Cooler, Sleeves, Triggers, Earphones
            $table->integer('price');
            $table->integer('original_price')->nullable();
            $table->string('image_path');
            $table->text('description');
            $table->json('specs')->nullable();
            $table->json('features')->nullable();
            $table->decimal('rating', 3, 1)->default(4.8);
            $table->string('shopee_link')->nullable();
            $table->string('tokopedia_link')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        // 2. Testimonials Table
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('avatar_path')->nullable();
            $table->integer('rating')->default(5);
            $table->text('message');
            $table->timestamps();
        });

        // 3. Support/Warranty Messages Table
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'contact' or 'warranty'
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('product_name')->nullable(); // for warranty
            $table->string('invoice_number')->nullable(); // for warranty
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('products');
    }
};
