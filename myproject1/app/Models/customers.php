<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = "customers";
	protected $guarded = ['id'];   
	protected $timestamp = true;
	   public function orders()
{
	return $this->hasMany('App\Models\orders');
}

public function users()
	{
		return $this->belongsTo('App\Models\users','users_id');
	}
	
}
