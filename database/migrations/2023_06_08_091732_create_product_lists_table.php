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
        Schema::create('product_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('warrenty')->nullable();
            $table->string('product_code')->nullable();
            $table->enum('productremark',['none','sale','new','hot'])->default('none');
            $table->string('totalstock')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->float('price', 8, 2);
            $table->string('service_type');
            $table->float('special_price', 8, 2);
            $table->boolean('productfreature')->nullable();
            $table->enum('status',['none','active','inactive','draft'])->default('none');
            $table->string('image');
            $table->timestamps();
            // $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_lists');
    }
};
