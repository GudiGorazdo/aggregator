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
        Schema::create('subway_shop', function (Blueprint $table) {
            $table->unsignedBigInteger('id_shop');
            $table->unsignedBigInteger('id_subway');
            $table->primary(['id_shop', 'id_subway']);
            $table->foreign('id_shop')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('id_subway')->references('id')->on('subways')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subway_shop');
    }
};
