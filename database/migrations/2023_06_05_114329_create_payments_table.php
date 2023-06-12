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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('Invoice_Number');
            $table->string('Order_Number');
            $table->string('Payment_id');
            $table->string('payment_account_id')->nullable();
            $table->string('Userid');
            $table->float('totalprice', 8, 2);
            $table->float('shipping_hending', 8, 2);
            $table->float('insurance_cost', 8, 2);
            $table->float('shipping_discount_cost', 8, 2);
            $table->float('discount_price', 8, 2);
            $table->float('Grandtotal', 8, 2);
            $table->string('Payment_method');
            $table->string('PaymentStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
