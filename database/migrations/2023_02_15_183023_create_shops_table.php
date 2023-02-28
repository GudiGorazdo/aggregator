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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->text('logo')->nullable();
            $table->text('photos')->nullable();
            $table->text('title')->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->text('zip')->nullable();
            $table->text('coord')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('additional_phones')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('telegram')->nullable();
            $table->text('vk')->nullable();
            $table->text('web')->nullable();
            $table->text('more_socials')->nullable();
            $table->text('emails')->nullable();
            $table->boolean('convenience_shop')->default(false);
            $table->boolean('appraisal_online')->default(false);
            $table->boolean('pawnshop')->default(false);
            $table->text('yandex_rating')->nullable();
            $table->text('google_rating')->nullable();
            $table->text('gis_rating')->nullable();
            $table->text('avito_rating')->nullable();
            $table->text('average_rating')->nullable();
            $table->text('yandex_comments')->nullable();
            $table->text('google_comments')->nullable();
            $table->text('gis_comments')->nullable();
            $table->text('avito_comments')->nullable();
            $table->boolean('show')->default(true);
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
