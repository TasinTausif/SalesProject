<?php

namespace App\Http\Controllers;

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
			'quantity'     => 'required',
			'size'         => 'required',
			'buying_price' => 'required',
		] );

		$attributes['user_id'] = auth()->id();

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
		$attributes = $request->validate( [
			'product_name' => 'required',
			'quantity'     => 'required',
			'size'         => 'required',
			'buying_price' => 'required',
		] );

		Supplier::find( $id )->update( $attributes );

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
}
