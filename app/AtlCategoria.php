<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtlCategoria extends Model
{
	
	protected $fillable=[ 'categoria','atleta'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atl_categorias'; 
}

