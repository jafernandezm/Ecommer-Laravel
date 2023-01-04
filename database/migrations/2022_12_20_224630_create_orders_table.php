<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->string('status')->default('pending');

            $table->bigInteger('customer_id')->unsigned();
            //customer_id later 
            //$table->string('payment_method');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
