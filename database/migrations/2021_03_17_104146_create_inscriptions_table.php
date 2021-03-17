<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_media_id')->index()->nullable()->comment("");
            $table->foreign('type_media_id')->references('id')->on('type_media');
            $table->unsignedBigInteger('stade_id')->index()->nullable()->comment("");
            $table->foreign('stade_id')->references('id')->on('stades');
            $table->string('nom_media')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('ville_id')->index()->nullable()->comment("");
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::dropIfExists('inscriptions');
    }
}
