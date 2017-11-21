<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtlClube extends Model
{
	
	protected $fillable=[ 'clube','atleta','data'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atlclubes'; 
}
