<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Quantity;
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
			's'  => 'required|numeric|min:0',
			'm'  => 'required|numeric|min:0',
			'l'  => 'required|numeric|min:0',
			'xl' => 'required|numeric|min:0',
		] );

		$product = Supplier::find( $id );
		$qt = Quantity::find( $product->quantity_id );

		$quantity = $attributes['s'] + $attributes['m'] + $attributes['l'] + $attributes['xl'];

		$attributes['user_id'] = auth()->id();
		$attributes['supplier_id'] = $product->id;
		$attributes['total_price'] = $product['selling_price'] * $quantity;

		Customer::create( $attributes );

		$var['remaining_s'] = $qt->remaining_s - $request->s;
		$var['remaining_m'] = $qt->remaining_m - $request->m;
		$var['remaining_l'] = $qt->remaining_l - $request->l;
		$var['remaining_xl'] = $qt->remaining_xl - $request->xl;
		$var['total_remaining'] = $var['remaining_s'] + $var['remaining_m'] + $var['remaining_l'] + $var['remaining_xl'];
		$qt->update( $var );

		toastr()->success( 'Product Purchase Success', 'Purchased!' );
		return redirect( route( 'customer.create' ) );
	}

	public function show( string $id ) {
		$product = Supplier::find( $id );

		return view( 'customer.show', compact( 'product' ) );
	}
}
