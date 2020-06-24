<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('branch_id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('notes')->nullable();
            $table->integer('user_type');// 1 for expected, 0 for current
            $table->date('expected_user_date')->nullable();
            $table->integer('alert_after_hours')->nullable();
            $table->integer('is_active')->default(1);

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
        Schema::dropIfExists('clients');
    }
}
