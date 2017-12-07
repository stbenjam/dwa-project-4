<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
	public function categories() {
	    return $this->belongsToMany('App\Category')->withTimestamps();
	}

	public function credit_card_categories() {
	    return $this->hasMany('App\CreditCardCategory');
	}
}
