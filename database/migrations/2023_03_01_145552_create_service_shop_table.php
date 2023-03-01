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
        Schema::create('service_shop', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('service_id');
            $table->decimal('rating', 10, 2);
            $table->text('comments');
            $table->primary(['shop_id', 'service_id']);
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_services');
    }
};
