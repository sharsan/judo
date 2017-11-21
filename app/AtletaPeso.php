<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtletaPeso extends Model
{
	
	protected $fillable=[ 'peso','atleta_id','data','descricao'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'atletapesos'; 
}
