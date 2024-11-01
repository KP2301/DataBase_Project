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
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('set null');
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('customerID')->references('id')->on('customers')->onDelete('set null');
            $table->foreign('productID')->references('id')->on('products')->onDelete('set null');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('customerID')->references('id')->on('customers')->onDelete('set null');
        });

        Schema::table('rating', function (Blueprint $table) {
            $table->foreign('customerID')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('productID')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('orderID')->references('id')->on('orders')->onDelete('cascade');
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
