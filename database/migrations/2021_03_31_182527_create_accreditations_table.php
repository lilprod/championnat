<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_accreditation_id')->index()->nullable()->comment("");
            $table->foreign('type_accreditation_id')->references('id')->on('type_accreditations');
            $table->unsignedBigInteger('stade_id')->index()->nullable()->comment("");
            $table->foreign('stade_id')->references('id')->on('stades');
            $table->unsignedBigInteger('media_id')->index()->nullable()->comment("");
            $table->foreign('media_id')->references('id')->on('media');
            $table->unsignedBigInteger('type_media_id')->index()->nullable()->comment("");
            $table->foreign('type_media_id')->references('id')->on('type_media');
            $table->unsignedBigInteger('user_id')->index()->nullable()->comment("");
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nom_media')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('ville_id')->index()->nullable()->comment("");
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->unsignedBigInteger('evenement_id')->index()->nullable()->comment("");
            $table->foreign('evenement_id')->references('id')->on('evenements');
            $table->unsignedBigInteger('journee_id')->index()->nullable()->comment("");
            $table->foreign('journee_id')->references('id')->on('journees');
            $table->boolean('status')->default(0);
            $table->date('date_match')->nullable();
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
        Schema::dropIfExists('accreditations');
    }
}
