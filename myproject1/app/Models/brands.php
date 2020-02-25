<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    protected $table = "brands";
	protected $guarded = ['id'];   
	protected $timestamp = true;
	public function products()
	{
		return $this->hasMany('App\Models\Products');
	}
}
