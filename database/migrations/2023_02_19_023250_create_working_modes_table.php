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
            $table->text('monday_open')->nullable();
            $table->text('monday_close')->nullable();
            $table->text('tuesday_open')->nullable();
            $table->text('tuesday_close')->nullable();
            $table->text('wednesday_open')->nullable();
            $table->text('wednesday_close')->nullable();
            $table->text('thursday_open')->nullable();
            $table->text('thursday_close')->nullable();
            $table->text('friday_open')->nullable();
            $table->text('friday_close')->nullable();
            $table->text('saturday_open')->nullable();
            $table->text('saturday_close')->nullable();
            $table->text('sunday_open')->nullable();
            $table->text('sunday_close')->nullable();
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
