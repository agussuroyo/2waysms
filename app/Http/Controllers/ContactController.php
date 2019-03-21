<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use function auth;
use function redirect;
use function route;
use function view;

class ContactController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view( 'contact', [
			'contacts' => auth()->user()->contacts()->orderBy( 'name', 'ASC' )->paginate( 10 )
				] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
		return view( 'contact-create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store( Request $request ) {
		//

		$validator = Validator::make( $request->all(), array(
					'name'	 => 'required',
					'number' => 'required|min:10'
				) );

		if ( $validator->fails() ) {
			return redirect()->back()->withErrors( $validator )->withInput();
		}

		Contact::create( array(
			'user_id'	 => auth()->user()->id,
			'name'		 => $request->get( 'name' ),
			'number'	 => $request->get( 'number' )
		) );

		return redirect( route( 'contact.index' ) )->with( 'success', 'Contact saved.' );
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
	public function edit( Contact $contact ) {
		return view( 'contact-edit', $contact );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update( Request $request, Contact $contact ) {
		//
		$validator = Validator::make( $request->all(), array(
					'name'	 => 'required',
					'number' => 'required|min:10'
				) );

		if ( $validator->fails() ) {
			return back()->withInput()->withErrors( $validator );
		}

		$contact->update( $request->all() );

		return back()->with( 'success', 'Contact updated' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy( Contact $contact ) {
		//
		$contact->delete();
		
		return back()->with('success', 'Contact deleted');
	}

}
