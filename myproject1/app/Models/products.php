<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";
	protected $guarded = ['id'];   
	protected $timestamp = true;
	public function orders_details()
	{
		return $this->hasMany('App\Models\orders_details');
	}
	public function categories()
	{
		return $this->belongsTo('App\Models\categories','categorie_id');
	}
	public function brands()
	{
		return $this->belongsTo('App\Models\brands','brand_id');
	}
	public function orders()
	{
	   	return $this->belongsToMany('App\Models\orders','orders_details','order_id','product_id');
	}
}
