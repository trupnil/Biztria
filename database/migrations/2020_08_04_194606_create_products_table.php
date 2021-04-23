<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('categoty_Id')->nullable();   
            $table->integer('subcategoty_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('images');
            $table->string('main_price');
            $table->string('discount_price');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->enum('stock_status',['instock','out_of_stock'])->nullable();
            $table->longText('details');
            $table->longText('specification');
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
        Schema::dropIfExists('products');
    }
}
