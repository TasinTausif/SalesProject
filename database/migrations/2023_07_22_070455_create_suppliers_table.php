<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void{
		Schema::create( 'suppliers', function ( Blueprint $table ) {
			$table->id();
			$table->foreignId( 'user_id' )->constrained()->cascadeOnDelete();
			$table->string( 'product_id' )->unique();
			$table->string( 'product_name' );
			$table->integer( 'quantity' );
			$table->string( 'size' );
			$table->string( 'buying_price' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void{
		Schema::dropIfExists( 'suppliers' );
	}
};
