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
	 * Store a newly created resource in storage.
	 */
	public function store( string $id, Request $request ) {
		$attributes = $request->validate( [
			'quantity' => 'required',
		] );

		$product = Supplier::find( $id );

		$attributes['user_id'] = auth()->id;
		$attributes['supplier_id'] = $product->user->name;
		$attributes['total_price'] = $product['selling_price'] * $request->quantity;

		$var = $product['remaining'] - $request->quantity;

		dd( $attributes );
		PHP_EOL;
		dd( $var );
		// $product->update( $product['remaining'] = $var );

		// Customer::create( $attributes );

		// toastr()->success( 'Product Purchase Success', 'Purchased!' );
		// return redirect()->back();
	}

	public function show( string $id ) {
		$product = Supplier::find( $id );

		return view( 'customer.show', compact( 'product' ) );
	}
}
