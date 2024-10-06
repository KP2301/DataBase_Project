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
        Schema::create('orderDetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderID')->nullable()->constrained('orders')->onDelete('set null'); // Foreign key
            $table->foreignId('productID')->nullable()->constrained('products')->onDelete('set null'); // Foreign key
            $table->unsignedBigInteger('totalPrice');
            $table->integer('quantity'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderDetail');
    }
};
