<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaixaemailsTable extends Migration
{     public function up()
    {
        Schema::create('caixaemails', function (Blueprint $table) {
            $table->increments('id');
            $table->double('user_name', 40); 
            $table->string('sender_email',40);
            $table->double('subject', 40);
            $table->double('content', 150); 
            $table->double('recipient_name', 40);
            $table->double('recipient_email', 40);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('caixaemails');
    }
}
