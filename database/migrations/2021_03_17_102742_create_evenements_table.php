<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('date_match')->nullable();
            $table->unsignedBigInteger('journee_id')->index()->nullable()->comment("");
            $table->foreign('journee_id')->references('id')->on('journees');
            $table->unsignedBigInteger('stade_id')->index()->nullable()->comment("");
            $table->foreign('stade_id')->references('id')->on('stades');
            $table->integer('quota')->nullable();
            $table->integer('left_place')->nullable();
            $table->string('slug')->nullable();
            $table->mediumText('description')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('evenements');
    }
}
