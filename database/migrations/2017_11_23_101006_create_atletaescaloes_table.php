<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletaescaloesTable extends Migration
{ 
    public function up()
    {
        Schema::create('atletaescaloes', function (Blueprint $table) {
            $table->increments('id');  

            $table->string('atleta_id')->unsigned();
            $table->string('atleta_id')->
            references('id')->on('atletas')->
            onDelete('RESTRICT');  

            $table->integer('escalao_id')->unsigned();
            $table->foreign('escalao_id')->
            references('id')->
            on('escaloes')->
            onDelete('RESTRICT'); 

            $table->timestamps(); 
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('atletaescaloes');
    }
}
