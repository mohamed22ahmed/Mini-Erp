<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeOutOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_out_operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('income_out_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('branch_id');
            $table->date('operation_date');
            $table->integer('value');
            $table->string('description')->nullable();
            $table->integer('type');
            $table->integer('is_confirmed')->default(0);

            $table->foreign('income_out_id')->references('id')->on('income_outs')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');

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
        Schema::dropIfExists('income_out_operations');
    }
}
