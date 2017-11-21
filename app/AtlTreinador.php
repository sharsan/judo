<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtlTreinador extends Model
{
	protected $fillable=[ 'treinador','atleta'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atl_treinadores'; 
}
