<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVideoPantalla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_pantallas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pantalla')->unsigned();
            $table->integer('video')->unsigned();
            $table->foreign('pantalla')->references('id')->on('pantallas');
            $table->foreign('video')->references('id')->on('videos');
            
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
        Schema::dropIfExists('video_pantallas');
    }
}
