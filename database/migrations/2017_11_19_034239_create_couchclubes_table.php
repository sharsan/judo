<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouchClubesTable extends Migration
{ 
    public function up()
    {
        Schema::create('couch_clubes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clube', 30); 
            $table->string('treinador', 40); 
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('couchclubes');
    }
}
