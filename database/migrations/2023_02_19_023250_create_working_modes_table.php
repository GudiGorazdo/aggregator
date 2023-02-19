<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_modes', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id');
            $table->integer('monday_open')->nullable();
            $table->integer('monday_close')->nullable();
            $table->integer('tuesday_open')->nullable();
            $table->integer('tuesday_close')->nullable();
            $table->integer('wednesday_open')->nullable();
            $table->integer('wednesday_close')->nullable();
            $table->integer('thursday_open')->nullable();
            $table->integer('thursday_close')->nullable();
            $table->integer('friday_open')->nullable();
            $table->integer('friday_close')->nullable();
            $table->integer('saturday_open')->nullable();
            $table->integer('saturday_close')->nullable();
            $table->integer('sunday_open')->nullable();
            $table->integer('sunday_close')->nullable();
            $table->foreign('shop_id')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_modes');
    }
};
