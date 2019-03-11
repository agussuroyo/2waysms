<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	public function sent() {
		return $this->hasMany( Message::class, 'from' );
	}

	public function messages() {
		return $this->hasMany( Message::class, 'to' );
	}

	public function owner() {
		return $this->belongsTo( User::class );
	}

}
