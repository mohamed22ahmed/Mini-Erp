<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('buy_order_id')->nullable();
            $table->unsignedBigInteger('sell_order_id')->nullable();
            $table->integer('amount');
            $table->integer('discount_amount');
            $table->integer('price');
            $table->integer('total');
            $table->integer('order_type');// 1 buy, 2 sell

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('buy_order_id')->references('id')->on('buy_orders')->onDelete('cascade');
            $table->foreign('sell_order_id')->references('id')->on('sell_orders')->onDelete('cascade');

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
        Schema::dropIfExists('product_orders');
    }
}
