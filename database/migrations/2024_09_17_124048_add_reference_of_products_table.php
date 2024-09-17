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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('id')->references('productID')->on('carts')->onDelete('set null');
            $table->foreign('id')->references('productID')->on('orders')->onDelete('set null');
            $table->foreign('id')->references('productID')->on('rating')->onDelete('set null');
            $table->foreign('id')->references('productID')->on('orderDetail')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
