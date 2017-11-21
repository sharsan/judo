<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtlCinturao extends Model
{
	
	protected $fillable=[ 'atleta','cinturao','data','descricao'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atlcinturao'; 
}

