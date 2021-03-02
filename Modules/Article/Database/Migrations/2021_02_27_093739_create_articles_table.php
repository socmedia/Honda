<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 191)->unique();
            $table->string('slug_title', 191);
            $table->string('blog_type');
            $table->text('tags')->nullable();
            $table->string('image');
            $table->text('subject')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('viewer')->default(0);
            $table->boolean('published')->default(0);
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
        Schema::dropIfExists('articles');
    }
}