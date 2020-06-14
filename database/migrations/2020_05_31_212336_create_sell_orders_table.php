<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('mandoop_id')->default(0);
            $table->unsignedBigInteger('recharge_company_id')->default(0);
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('delivery_id')->default(0);
            $table->integer('type');// 1 for sell, 2 for back
            $table->integer('status');// 1 inRecharge, 2 inPaid, 3 Done, 4 withCharge, 5 withoutCharge
            $table->integer('recharge_price');
            $table->integer('free_recharge');// 1 free, 2 paid
            $table->integer('total_discount');
            $table->integer('total');
            $table->integer('product_count');
            $table->date('delivery_date');
            $table->integer('waiting_delivery');// 1 true, 0 false

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('mandoop_id')->references('id')->on('mandoops')->onDelete('cascade');
            $table->foreign('recharge_company_id')->references('id')->on('recharge_companies')->onDelete('cascade');
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
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
        Schema::dropIfExists('sell_orders');
    }
}
