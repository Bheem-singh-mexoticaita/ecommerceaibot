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
        Schema::create('cart_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('session');
            $table->string('product_id');
            $table->float('product_price', 8, 2);
            $table->string('product_quantity');            
            $table->float('product_total_price', 8, 2);
            $table->string('old_session')->nullable();
            $table->json('cart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_sessions');
    }
};
