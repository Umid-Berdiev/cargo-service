<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
	protected $guarded = [];    
	
	public function consignment()
  {
  	return $this->belongsTo('App\Consignment');
  }    

}
