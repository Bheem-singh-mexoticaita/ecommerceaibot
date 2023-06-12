<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_orders', function (Blueprint $table) {
            $table->id();
            $table->string('Order__id');
            $table->string('user_id');
            $table->string('product_id');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('quantity');
            $table->float('unit_price', 8, 2);
            $table->float('total_price', 8, 2);
            $table->string('email');
            $table->string('name');
            $table->string('Phone_Number');
            $table->string('payment_method');
            $table->text('delivery_address');
            $table->string('city');
            $table->string('delivery_charge');
            $table->string('order_date');
            $table->string('order_time');
            $table->string('order_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_orders');
    }
}
