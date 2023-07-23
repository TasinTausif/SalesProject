<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$data = Supplier::all();
		return view( 'home', compact( 'data' ) );
	}

	//__Password change__//
	public function passwordChange() {
		return view( 'password_change' );
	}

	public function passwordUpdate( Request $request ) {
		$request->validate( [
			'current_password'         => 'required',
			'newPassword'              => 'required|min:6|max:16|confirmed',
			'newPassword_confirmation' => 'required',
		] );

		if ( Hash::check( $request->current_password, Auth::user()->password ) ) {
			User::whereId( auth()->user()->id )->update( [
				'password' => Hash::make( $request->newPassword ),
			] );
			toastr()->success( 'Password updated successfully', 'Great!' );
			return redirect( '/' );
		} else {
			toastr()->error( 'Password did not match', 'Sorry!' );
			return redirect()->back();
		}

	}

}
