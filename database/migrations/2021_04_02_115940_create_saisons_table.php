<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id')->index()->nullable()->comment("");
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->string('title');
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('saisons');
    }
}
