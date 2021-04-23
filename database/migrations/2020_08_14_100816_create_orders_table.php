<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('order_code');
            $table->string('order_name');
            $table->string('order_email');
            $table->string('order_phone');
            $table->string('order_address');
            $table->integer('order_zip');
            $table->string('city');
            $table->string('order_notes')->nullable();
            $table->enum('payment',['cod','online'])->default('cod');
            $table->string('order_transaction')->nullable();
            $table->enum('status',['pending','cancle','delivered'])->default('pending');
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
