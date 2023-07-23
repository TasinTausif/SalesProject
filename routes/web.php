<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get( '/', function () {
	return view( 'home' );
} )->middleware( 'auth' );

Auth::routes();

Route::get( '/home', [HomeController::class, 'index'] )->name( 'home' )->middleware( 'verified' );

//__Email Verification__//
Route::get( '/email/verify', function () {
	return view( 'auth.verify' );
} )->middleware( 'auth' )->name( 'verification.notice' );

Route::get( '/email/verify/{id}/{hash}', function ( EmailVerificationRequest $request ) {
	$request->fulfill();

	return redirect( '/home' );
} )->middleware( ['auth', 'signed'] )->name( 'verification.verify' );

Route::post( '/email/verification-notification', function ( Request $request ) {
	$request->user()->sendEmailVerificationNotification();

	return back()->with( 'message', 'Verification link sent!' );
} )->middleware( ['auth', 'throttle:6,1'] )->name( 'verification.send' );

//__Reset Password__//
Route::middleware( 'verified' )->group( function () {
	Route::get( '/password/change', [HomeController::class, 'passwordChange'] )->name( 'password.change' );
	Route::post( '/password/updated', [HomeController::class, 'passwordUpdate'] )->name( 'password.updated' );
} );

//__Supplier__//
Route::resource( 'supplier', SupplierController::class )->except( 'show' )->middleware( 'verified' );

//__Customer__//
Route::resource( 'customer', CustomerController::class )->only( 'create', 'store', 'index' )->middleware( 'verified' );