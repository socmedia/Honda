<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenuinePartHasAdvantagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genuine_part_has_advantages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genuine_parts_id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();

            $table->foreign('genuine_parts_id')->references('id')->on('genuine_parts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genuine_part_has_advantages');
    }
}