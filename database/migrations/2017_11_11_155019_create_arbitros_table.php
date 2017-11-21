<?php 
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbitrosTable extends Migration
{ 
    public function up()
    {
        Schema::create('arbitros', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('nome', 45);
            $table->string('apelido', 15)->nullable();  
            $table->string('sexo', 2);
            $table->integer('ano')->nullable();            
            $table->integer('telefone')->nullable();  
            $table->string('email', 40)->nullable();     
            $table->string('descricao', 150)->nullable();    
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('arbitros');
    }
} 
