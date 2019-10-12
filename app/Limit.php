<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
	protected $table = 'limits';
    protected $fillable = [
    	'activity_id','activity_name','start_date','end_date'
    ];    
}
