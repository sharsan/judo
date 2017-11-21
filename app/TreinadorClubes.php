<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreinadorClubes extends Model
{
	
	protected $fillable=[ 'clube_id','treinador_id'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'treinadorclubes'; 
}
