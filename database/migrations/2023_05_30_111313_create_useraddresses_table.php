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
        Schema::create('useraddresses', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('First_name');
            $table->string('last_name');
            $table->boolean('is_shipping_addre');	
            $table->string('Addresstype')->nullable();	
            $table->string('Phone_Number')->nullable();	
            $table->string('country_id');	
            $table->string('country');
            $table->string('state_id');	
            $table->string('state');
            $table->string('address1');
            $table->string('address2');
            $table->string('city_id');	
            $table->string('city');
            $table->string('pincode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useraddresses');
    }
};
