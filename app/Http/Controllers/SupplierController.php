<?php

namespace App\Http\Controllers;

use App\Models\Quantity;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$products = Supplier::all();

		return view( 'supplier.index', compact( 'products' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create() {
		return view( 'supplier.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {

		$attributes = $request->validate( [
			'product_id'   => 'required|unique:suppliers,product_id',
			'product_name' => 'required',
			'quantity_id'  => 'required|numeric|min:1',
			'buying_price' => 'required',
		] );

		$attributes['user_id'] = auth()->id();
		$attributes['selling_price'] = $request->buying_price / $request->quantity_id;

		$var['remaining_s'] = $var['s'] = $request->s ?? 0;
		$var['remaining_m'] = $var['m'] = $request->m ?? 0;
		$var['remaining_l'] = $var['l'] = $request->l ?? 0;
		$var['remaining_xl'] = $var['xl'] = $request->xl ?? 0;

		$var['total_remaining'] = $var['total'] = $var['s'] + $var['m'] + $var['l'] + $var['xl'];

		$qnt = Quantity::create( $var );

		$attributes['quantity_id'] = $qnt->id;

		Supplier::create( $attributes );

		toastr()->success( 'Product added successfully', 'Product Added!' );
		return redirect()->back();
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit( string $id ) {
		$product = Supplier::find( $id );

		return view( 'supplier.edit', compact( 'product' ) );
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		$request->validate( [
			'product_name' => 'required',
			'quantity_id'  => 'required|numeric|min:1',
			'buying_price' => 'required',
		] );

		$attributes['product_name'] = $request->product_name;
		$attributes['buying_price'] = $request->buying_price;
		$attributes['selling_price'] = $request->buying_price / $request->quantity_id;

		$var['remaining_s'] = $var['s'] = $request->s ?? 0;
		$var['remaining_m'] = $var['m'] = $request->m ?? 0;
		$var['remaining_l'] = $var['l'] = $request->l ?? 0;
		$var['remaining_xl'] = $var['xl'] = $request->xl ?? 0;

		$var['total_remaining'] = $var['total'] = $var['s'] + $var['m'] + $var['l'] + $var['xl'];

		$supply = Supplier::find( $id );
		Quantity::find( $supply->quantity_id )->update( $var );
		$supply->update( $attributes );

		toastr()->warning( 'Product updated successfully', 'Product updated!' );
		return redirect( route( 'supplier.index' ) );
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		Supplier::find( $id )->delete();

		toastr()->error( 'Product deleted successfully', 'Product deleted!' );
		return redirect( route( 'supplier.index' ) );
	}

	public function quantity() {
		return view( 'supplier.quantity' );
	}
	public function quantity_edit( string $id ) {
		$product = Supplier::find( $id );
		return view( 'supplier.quantity_edit', compact( 'product' ) );
	}
}
