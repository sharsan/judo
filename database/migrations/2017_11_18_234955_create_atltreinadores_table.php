<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtlTreinadoresTable extends Migration
{ 
    public function up()
    {
        Schema::create('atltreinadores', function (Blueprint $table) { 
            $table->increments('id');

            $table->string('atleta_id')->unsigned();
            $table->string('atleta_id')->
            references('id')->on('atletas')->
            onDelete('RESTRICT'); 

            $table->integer('treinador_id')->unsigned();
            $table->foreign('treinador_id')->
            references('id')->
            on('treinadores')->
            onDelete('RESTRICT');

            $table->timestamps();  
        });
    } 

    public function down()
    {
        Schema::dropIfExists('atltreinadores');
    }
}
