<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletaPesosTable extends Migration
{ 
    public function up()
    {
        Schema::create('atletapesos', function (Blueprint $table) {
            $table->increments('id');
            $table->float ('peso',5); 
            $table->date('data'); 
            $table->integer('atleta_id')->unsigned();
            $table->foreign('atleta_id')->
            references('id')->
            on('atletas')->
            onDelete('cascade');
            $table->timestamps(); 
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('atletapesos');
    }
}
