<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from_store');
            $table->unsignedBigInteger('to_store');
            $table->unsignedBigInteger('admin_id');
            $table->date('transfer_date');
            $table->integer('product_count');

            $table->foreign('from_store')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('to_store')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('store_transfers');
    }
}
