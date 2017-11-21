<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtlEscalao extends Model
{
	protected $fillable=[ 'escalao','atleta'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atlescaloes'; 
}
