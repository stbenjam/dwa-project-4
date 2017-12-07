<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CreditCardCategory;
use App\CreditCard;

class CreditCardCategoriesController extends Controller
{

    /**
     * Index page for credit card categories
     *
     * GET /credit_cards/{id}/categories
     */
    public function index(Request $request, $id) {
        return view('credit_cards.categories')->with([
            'credit_card' => CreditCard::where('id', '=', $id)->first(),
            'categories' => CreditCardCategory::with('category')->where('credit_card_id', '=', $id)->get(),
        ]);
    }


    /**
     * Delete category/cc assocation
     *
     * DELETE /credit_cards/{credit_card_id}/categories/{category_id}
     */
    public function delete(Request $request, $credit_card_id, $category_id) {

         $ccc = CreditCardCategory::with('category')->where('credit_card_id', '=', $credit_card_id)->where('category_id','=',$category_id)->first();
         $name = $ccc->category->name;
         $ccc->delete();

         return redirect("/credit_cards/$credit_card_id/categories")->with('alert', "$name was deleted.");
    }
}
