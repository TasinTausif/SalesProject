<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void{
		Schema::create( 'quantities', function ( Blueprint $table ) {
			$table->id();
			$table->integer( 's' )->default( 0 )->nullable();
			$table->integer( 'm' )->default( 0 )->nullable();
			$table->integer( 'l' )->default( 0 )->nullable();
			$table->integer( 'xl' )->default( 0 )->nullable();
			$table->integer( 'remaining_s' )->default( 0 )->nullable();
			$table->integer( 'remaining_m' )->default( 0 )->nullable();
			$table->integer( 'remaining_l' )->default( 0 )->nullable();
			$table->integer( 'remaining_xl' )->default( 0 )->nullable();
			$table->integer( 'total' )->default( 0 )->nullable();
			$table->integer( 'total_remaining' )->default( 0 )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void{
		Schema::dropIfExists( 'quantities' );
	}
};
