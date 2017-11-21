<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouchClube extends Model
{
	
	protected $fillable=[ 'clube','treinador'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'couchclubes'; 
}
