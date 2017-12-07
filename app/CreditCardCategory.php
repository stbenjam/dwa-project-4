<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCardCategory extends Model
{
	protected $table = 'credit_card_category';

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function credit_card() {
		return $this->belongsTo('App\CreditCard');
	}
}
