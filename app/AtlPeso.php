<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtlPeso extends Model
{
	protected $fillable=[ 'peso','atleta','data','descricao'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atlpesos'; 
}
