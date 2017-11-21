<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinturao extends Model
{
	protected $fillable=[ 'nome','descricao'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'cinturao'; 
}
