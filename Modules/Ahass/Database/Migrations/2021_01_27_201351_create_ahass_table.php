<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahass', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->char('regency_id', 4);
            $table->bigInteger('phone_1')->nullable();
            $table->bigInteger('phone_2')->nullable();
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
        Schema::dropIfExists('ahass');
    }
}