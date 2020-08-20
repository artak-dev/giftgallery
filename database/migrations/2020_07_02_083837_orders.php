<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('gift_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('city');
            $table->string('billing_state')->nullable();
            $table->string('address');
            $table->string('phone_number');
            $table->string('postal_code')->nullable();
            $table->string('email');
            $table->string('notes')->nullable();
            $table->string('paymenth');
            $table->string('paymenth_price');
            $table->string('status');
            $table->string('count');
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
        Schema::dropIfExists('orders');
    }
}
