<?php

use Illuminate\Database\Seeder;
use App\CreditCard;
use App\Category;
use App\CreditCardCategory;

class CreditCardCategorySeeder extends Seeder
{
    public function run() {
        $credit_cards_categories = [
            'Chase Sapphire Reserve' =>  [
                'Restaurants' 	    => 3.0,
                'Travel'	  	    => 3.0,
                'Airfare'           => 3.0,
                'Everything Else'	=> 1.0,
            ],

            'Chase Sapphire Preferred' =>  [
                'Restaurants' 	    => 2.0,
                'Travel'	  	    => 2.0,
                'Everything Else'	=> 1.0,
            ],

            'Chase Freedom' => [
                'Everything Else'   => 1.0,
            ],

            'Chase Freedom Unlimited' =>  [
                'Everything Else'   => 1.5,
            ],

        ];

        foreach ($credit_cards_categories as $credit_card_name => $categories) {
            $credit_card = CreditCard::where('name', 'like', $credit_card_name)->pluck('id')->first();

            foreach($categories as $category_name =>  $earn_rate) {
                $category = Category::where('name', 'like', $category_name)->pluck('id')->first();

                CreditCardCategory::insert([
                    'credit_card_id' => $credit_card,
                    'category_id'    => $category,
                    'earn_rate'	     => $earn_rate,
                ]);
            }
        }
      }
}
