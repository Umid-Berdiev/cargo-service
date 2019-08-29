<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consignment extends Model
{
	protected $guarded = [];

	public function document()
	{
		return $this->belongsTo('App\Document');
	}

	public function goods()
	{
		return $this->hasMany('App\Goods');
	}

	public function reference_documents()
	{
		return $this->hasMany('App\ReferenceDocument');
	}
}
