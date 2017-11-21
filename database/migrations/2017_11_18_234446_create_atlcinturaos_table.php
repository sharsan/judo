<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtlCinturaosTable extends Migration
{ 
    public function up()
    {
        Schema::create('atl_cinturaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cinturao', 30); 
            $table->string('atleta', 40); 
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('atl_cinturaos');
    }
}
