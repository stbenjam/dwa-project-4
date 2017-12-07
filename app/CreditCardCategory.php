<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCardCategory extends Model
{
	protected $table = 'credit_card_category';
    protected $primaryKey = ['category_id', 'credit_card_id'];
    public $incrementing = false;

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function credit_card() {
		return $this->belongsTo('App\CreditCard');
	}
}
