<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = "categories";
	protected $guarded = ['id'];   
	protected $timestamp = true;
	   public function products()
{
	return $this->hasMany('App\Models\Products');
}
}
