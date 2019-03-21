<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

	protected $fillable = array(
		'tw_id',
		'from',
		'to',
		'message',
		'status'
	);

	public function sender() {
		return $this->belongsTo( Contact::class, 'from' );
	}

	public function receiver() {
		return $this->belongsTo( Contact::class, 'to' );
	}

}
