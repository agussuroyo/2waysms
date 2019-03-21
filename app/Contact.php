<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
	
	protected $fillable = array(
		'user_id',
		'name',
		'number'
	);

	public function sent() {
		return $this->hasMany( Message::class, 'from', 'number' );
	}

	public function messages() {
		return $this->hasMany( Message::class, 'to', 'number' );
	}

	public function owner() {
		return $this->belongsTo( User::class );
	}

}
