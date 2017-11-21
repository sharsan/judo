<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinadorclubesTable extends Migration
{
    Schema::create('treinadorclubes', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('treinador_id')->unsigned();
        $table->foreign('treinador_id')->
        references('id')->
        on('treinadores')->
        onDelete('RESTRICT');
        $table->timestamps();
        
        $table->string('clube_id')->unsigned(); 
        $table->string('clube_id')->
        references('id')->
        on('clubes')->
        onDelete('RESTRICT');
        $table->timestamps();
    });
} 

public function down()
{
    Schema::dropIfExists('treinadorclubes');
}
}
