<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
          $table->integer('order_id')->unsigned();
          $table->integer('product_id')->unsigned();
          $table->integer('quantity');
          $table->string('currency');
          $table->timestamps();
        });

        Schema::table('order_items', function ($table) {
          $table->foreign('order_id')->references('id')->on('orders');
          $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
