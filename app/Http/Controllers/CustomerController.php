<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

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
	public function store( Request $request, string $id ) {
		$attributes = $request->validate( [
			'quantity' => 'required',
		] );

		$product = Supplier::find( $id );

		$attributes['user_id'] = auth()->id;
		$attributes['product_id'] = $product->id;
		$attributes['supplier_id'] = $product->user->name;

		dd( $attributes );
	}
}
