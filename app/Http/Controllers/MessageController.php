<?php

namespace App\Http\Controllers;

use App\Message;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Twilio\Rest\Client;
use function config;
use function view;

class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store( Request $request ) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy( $id ) {
		//
	}

	public function to( Request $request, $id ) {

		return view( 'sms', array(
			'number' => \App\Contact::find( $id )->number
				) );
	}

	public function sms( Request $request ) {
		return view( 'sms', array(
			'number' => ''
		) );
	}

	public function send( Request $request ) {

		$sid	 = config( 'twilio.sid' );
		$token	 = config( 'twilio.token' );

		try {

			$client	 = new Client( $sid, $token );
			$numbers = explode( PHP_EOL, $request->get( 'numbers' ) );
			$numbers = array_map( 'trim', $numbers );
			$message = $request->get( 'message' );

			foreach ( $numbers as $num ) {
				if ( strpos( $num, '+' ) !== false ) {
					$num = "+{$num}";
				}

				$client->messages->create( $num, array(
					'from'	 => config( 'twilio.number' ),
					'body'	 => $message
				) );
			}

			$response = [
				'code'		 => 200,
				'message'	 => 'OK'
			];
		} catch ( Exception $ex ) {
			$response = [
				'code'		 => $ex->getCode(),
				'message'	 => $ex->getMessage()
			];
		}

		return $response;
	}

	public function receiver( Request $request ) {
		
	}

}
