<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificacoesTable extends Migration
{ 
    public function up()
    {
        Schema::create('qualificacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('torneio', 45);
            $table->string('escalao', 15);
            $table->string('primeiro', 50);
            $table->string('segundo', 40);
            $table->integer('terceiro', 40);          
            $table->integer('juri', 40);    
            $table->string('descricao', 100);  
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('qualificacoes');
    }
}
