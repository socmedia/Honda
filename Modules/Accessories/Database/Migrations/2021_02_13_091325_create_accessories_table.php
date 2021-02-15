<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('products_id');
            $table->string('parts_number');
            $table->string('name');
            $table->string('slug_name');
            $table->text('function');
            $table->string('colors');
            $table->text('material');
            $table->string('price');
            $table->string('image');
            $table->boolean('show_in_catalogue')->default(1);
            $table->timestamps();

            $table->foreign('products_id')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessories');
    }
}