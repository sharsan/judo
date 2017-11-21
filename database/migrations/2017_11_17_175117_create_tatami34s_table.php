<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTatami34sTable extends Migration
{ 
    public function up()
    {
        Schema::create('tatami34s', function (Blueprint $table) 
        {
            $table->increments('id'); 
            $table->string('escalao',40);
            $table->string('sexo', 2);
            $table->double('torneio', 40);
            $table->double('atleta3', 40);
            $table->double('atleta4', 40);
            $table->double('vencedor34', 40);
            $table->double('vencido', 40);
            $table->double('juri', 40);  
            $table->string('descricao', 150);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tatami34s');
    }
}
