<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtlCinturoesTable extends Migration
{ 
    public function up()
    {
        Schema::create('atlcinturao', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('altleta_id')->unsigned();
            $table->foreign('altleta_id')->
            references('id')->
            on('atletas')->
            onDelete('cascade');

            $table->integer('cinturao_id')->unsigned();
            $table->foreign('cinturao_id')->
            references('id')->
            on('cinturoes')->
            onDelete('cascade');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('atlcinturao');
    }
}
