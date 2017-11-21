<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerceirosTable extends Migration
{ 
    public function up()
    {
        Schema::create('terceiros', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('torneio', 45);
            $table->string('escalao', 15);
            $table->string('vencido12', 40);
            $table->string('vencido34', 40);
            $table->string('juri', 40);
            $table->string('terceiro', 40); 
            $table->string('email', 40);     
            $table->string('descricao', 100);  
            $table->timestamps();
        });
    } 
    public function down()
    {
        Schema::dropIfExists('terceiros');
    }
}
