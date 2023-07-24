<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$customers = Customer::all();
		return view( 'customer.index', compact( 'customers' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		$items = Supplier::all();
		return view( 'customer.create', compact( 'items' ) );
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update( string $id, Request $request ) {
		$attributes = $request->validate( [
			'quantity' => 'required',
		] );

		$product = Supplier::find( $id );

		$attributes['user_id'] = auth()->id();
		$attributes['supplier_id'] = $product->id;
		$attributes['total_price'] = $product['selling_price'] * $request->quantity;

		Customer::create( $attributes );

		$var = $product['remaining'] - $request->quantity;
		$product->update( array( 'remaining' => $var ) );

		toastr()->success( 'Product Purchase Success', 'Purchased!' );
		return redirect( route( 'customer.create' ) );
	}

	public function show( string $id ) {
		$product = Supplier::find( $id );

		return view( 'customer.show', compact( 'product' ) );
	}
}
