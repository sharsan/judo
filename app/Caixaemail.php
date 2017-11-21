<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caixaemail extends Model
{

	protected $fillable =['user_name','recipient_name','recipient_email','subject','content'];

	protected $guarded = ['id', 'created_at', 'update_at'];  
	
	protected $table = 'caixaemails';
}