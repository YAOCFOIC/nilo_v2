<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resquestinput;

class Information extends Model
{
	public $table = "Informations";
    protected $fillable = [
    	'tel','Nit','name','Email'
    ];
}
