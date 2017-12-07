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
     * GET /
     */
    public function index(Request $request, $id) {
        return view('credit_cards.categories')->with([
            'credit_card' => CreditCard::where('id', '=', $id)->first(),
            'categories' => CreditCardCategory::with('category')->where('credit_card_id', '=', $id)->get(),
        ]);
    }
}
