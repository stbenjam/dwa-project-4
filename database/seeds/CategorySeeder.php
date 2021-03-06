<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    
    public function run() {
        $categories = [
          "Airfare",
          "Hotels",
          "Restaurants",
          "Everything Else",
          "Gas",
    	  "Movie Theaters",
          "Travel",
          "JetBlue purchases",
          "Grocery stores",
        ];

        foreach($categories as $category) {
            Category::insert([
                'name' => $category,
            ]);
        }
    }
}
