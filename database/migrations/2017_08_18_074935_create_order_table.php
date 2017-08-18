<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
          $table->increments('id');
          $table->decimal('total_price', 2);
          $table->integer('seller_id')->unsigned();
          $table->integer('customer_id')->unsigned();
          $table->enum('status',['pending','canceled','complete']);
          $table->timestamps();
        });

        Schema::table('orders', function ($table) {
          $table->foreign('seller_id')->references('id')->on('sellers');
          $table->foreign('customer_id')->references('id')->on('customers');
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
