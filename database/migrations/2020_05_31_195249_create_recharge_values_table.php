<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Rec_company_id');
            $table->unsignedBigInteger('city_id');
            $table->integer('value');
            $table->string('notes')->nullable();

            $table->foreign('Rec_company_id')->references('id')->on('recharge_companies')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('recharge_values');
    }
}
