<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function credit_card_categories() {
	    return $this->hasMany('App\CreditCardCategory');
	}

}
