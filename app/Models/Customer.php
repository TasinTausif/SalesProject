<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
	use HasFactory;

	protected $fillable = [
		'user_id',
		'supplier_id',
		'quantity',
		'total_price',
	];

	public function user() {
		return $this->belongsTo( User::class, 'user_id' );
	}

	public function supplier() {
		return $this->belongsTo( Supplier::class, 'supplier_id' );
	}
}
