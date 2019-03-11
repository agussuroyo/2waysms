<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	//	
	public function sender() {
		return $this->belongsTo( Contact::class, 'from' );
	}

	public function receiver() {
		return $this->belongsTo( Contact::class, 'to' );
	}

}
