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
            $table->string('escalao_id', 30); 
            $table->string('atleta_id', 40); 
            $table->timestamps(); 
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('atletaescaloes');
    }
}
