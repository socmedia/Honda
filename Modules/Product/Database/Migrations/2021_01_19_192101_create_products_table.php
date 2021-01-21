<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->unique();
            $table->string('slug_name');
            $table->string('category');
            $table->boolean('is_new');
            $table->unsignedBigInteger('promo_price');
            $table->unsignedBigInteger('price');
            $table->text('engine')->nullable();
            $table->text('frame_n_feet')->nullable();
            $table->text('dimensions_and_weight')->nullable();
            $table->text('capacity')->nullable();
            $table->text('electricity')->nullable();
            $table->boolean('is_draft')->nullable();
            $table->string('brochure');
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
        Schema::dropIfExists('products');
    }
}