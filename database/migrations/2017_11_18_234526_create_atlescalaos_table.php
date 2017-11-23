<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtlEscalaosTable extends Migration
{ 
    public function up()
    {
        Schema::create('atlescaloes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('escalao', 30); 
            $table->string('atleta', 40); 
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('atlescaloes');
    }
}
