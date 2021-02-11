<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApparelHasImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apparel_has_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apparels_id');
            $table->string('image');
            $table->timestamps();

            $table->foreign('apparels_id')->references('id')->on('apparels')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apparel_has_images');
    }
}