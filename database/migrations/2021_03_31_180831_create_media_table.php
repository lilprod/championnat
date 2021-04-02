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
            $table->string('nom_media')->nullable();
            $table->string('name')->nullable();
            $table->string('firstname')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('slug')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('nationality')->nullable();
            $table->char('gender',1)->nullable();
            $table->string('profession')->nullable();
            $table->string('num_passport')->nullable();
            $table->string('num_cni')->nullable();
            $table->string('num_press_card')->nullable();
            $table->string('passport_image')->nullable();
            $table->string('cni_image')->nullable();
            $table->string('press_card_image')->nullable();
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
