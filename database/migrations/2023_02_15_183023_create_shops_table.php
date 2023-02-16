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
            $table->unsignedBigInteger('id_city');
            $table->unsignedBigInteger('id_area')->nullable();
            $table->text('logo')->nullable();
            $table->text('photo')->nullable();
            $table->text('title')->nullable();
            $table->text('name')->nullable();
            $table->text('descriprtion')->nullable();
            $table->text('zip')->nullable();
            $table->text('coord')->nullable();
            $table->text('phone')->nullable();
            $table->text('additional_phones')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('telegram')->nullable();
            $table->text('vk')->nullable();
            $table->text('web')->nullable();
            $table->text('more_socials')->nullable();
            $table->text('emails')->nullable();
            $table->boolean('convenience_shop')->default(false);
            $table->text('working_mode')->nullable();
            $table->boolean('appraisal_online')->default(false);
            $table->boolean('pawnshop')->default(false);
            $table->text('yandex_rating')->nullable();
            $table->text('google_rating')->nullable();
            $table->text('2gis_rating')->nullable();
            $table->text('avito_rating')->nullable();
            $table->text('average_rating')->nullable();
            $table->text('yandex_comment')->nullable();
            $table->text('google_comment')->nullable();
            $table->text('2gis_comment')->nullable();
            $table->text('avito_comment')->nullable();
            $table->timestamps();
            $table->foreign('id_city')->references('id')->on('cities');
            $table->foreign('id_area')->references('id')->on('areas');
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
