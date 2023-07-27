<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model {
	use HasFactory;

	protected $fillable = [
		'user_id',
		'product_id',
		'product_name',
		'quantity_id',
		'buying_price',
		'selling_price',
	];

	public function user() {
		return $this->belongsTo( User::class, 'user_id' );
	}

	public function quantity() {
		return $this->belongsTo( Quantity::class, 'quantity_id' );
	}
}
