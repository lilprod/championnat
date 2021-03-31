<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_media_id')->index()->nullable()->comment("");
            $table->foreign('type_media_id')->references('id')->on('type_media');
            $table->unsignedBigInteger('user_id')->index()->nullable()->comment("");
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('profile_picture')->nullable();
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
        Schema::dropIfExists('media');
    }
}
