<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model {
	use HasFactory;

	protected $fillable = [
		's',
		'm',
		'l',
		'xl',
		'remaining_s',
		'remaining_m',
		'remaining_l',
		'remaining_xl',
		'total',
		'total_remaining',
	];

	public function supplier() {
		return $this->belongsTo( Supplier::class, 'supplier_id' );
	}
}
