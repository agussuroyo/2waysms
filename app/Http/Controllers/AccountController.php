<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use function __;
use function auth;
use function redirect;
use function view;

class AccountController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
	
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

		$validator = \Validator::make( $request->all(), array(
					'name'	 => 'required',
					'email'	 => 'required|email'
				) );

		if ( $validator->fails() ) {
			return redirect()->back()->with( 'errors', $validator->messages() );
		}

		$user = User::find( $id );
		$user->update( $request->all() );

		return redirect()->back()->with( 'success', __( 'Successfully updated.' ) );
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

	public function profile( Request $request ) {
		return view( 'profile', [
			'name'	 => auth()->user()->name,
			'email'	 => auth()->user()->email
				] );
	}

	public function changePassword( Request $request, $id ) {
		$validator = \Validator::make( $request->all(), array(
					'password'				 => 'required',
					'password_confirmation'	 => 'required|same:password_confirmation'
				) );

		if ( $validator->fails() ) {
			return redirect()->back()->with( 'errors', $validator->messages() );
		}

		$user = User::find( $id );
		$user->update( array(
			'password' => Hash::make( $request->get( 'password' ) )
		) );

		return redirect()->back()->with( 'success', __( 'Password updated.' ) );
	}

}
