<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtlTreinador extends Model
{
	protected $fillable=[ 'treinador_id','atleta_id'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atltreinadores'; 
}
