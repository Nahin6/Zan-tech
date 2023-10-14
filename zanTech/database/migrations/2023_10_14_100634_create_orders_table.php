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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customerId');
            $table->string('customerName');
            $table->string('customerDivision');
            $table->string('customerStreetAdress');
            $table->string('customerHomeAdress');
            $table->string('customerCity');
            $table->string('customerAditonalNotes')->nullable();
            $table->string('customerPromoCode')->nullable();
            $table->string('customerPhone');
            $table->string('customerEmail');
            $table->string('deliveryCharge')->nullable();
            $table->float('totalBill');
            $table->string('orderStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
