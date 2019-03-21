<?php

namespace App\Http\Controllers\Api;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;
use Twilio\Rest\Client;
use function env;
use function response;

class MessageController extends Controller {

	public function send( Request $request ) {

		$sid	 = env( 'TWILIO_SID' );
		$token	 = env( 'TWILIO_TOKEN' );
		$sender	 = env( 'TWILIO_NUMBER' );
		$code	 = 200;

		try {

			$contact = Contact::where( 'number', $sender )->first();

			if ( ! $contact ) {
				throw new Exception( 'Invalid contact', 401 );
			}

			$client	 = new Client( $sid, $token );
			$numbers = $request->get( 'numbers' );
			$numbers = is_string( $numbers ) ? explode( PHP_EOL, $numbers ) : $numbers;
			$numbers = array_map( 'trim', $numbers );
			$message = $request->get( 'message' );

			$ids = [];
			foreach ( $numbers as $num ) {

				if ( strpos( $num, '+' ) === false ) {
					$num = "+{$num}";
				}

				$msg = Message::create( array(
							'from'		 => $contact->number,
							'to'		 => $num,
							'message'	 => $message
						) );

				$ids[] = $msg->id;

				$send = $client->messages->create( $num, array(
					'from'	 => $sender,
					'body'	 => $message
						) );

				if ( $send ) {
					$msg->update( array(
						'tw_id'	 => $send->sid,
						'status' => 1
					) );
				}
			}

			$data = $contact->sent->whereIn( 'id', $ids );
		} catch ( \Exception $ex ) {

			$code	 = 401;
			$message = $ex->getMessage();

			if ( preg_match( '/\[HTTP ([0-9]+)\]/m', $message, $match ) && isset( $match[1] ) ) {
				$code = $match[1];
			}

			$data = array(
				'error' => array(
					'code'		 => $code,
					'message'	 => $ex->getMessage()
				)
			);
		}

		return response()->json( $data, $code );
	}

}
