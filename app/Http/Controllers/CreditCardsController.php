<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CreditCard;

class CreditCardsController extends Controller
{

    /**
     * Index page for credit card list
     *
     * GET /
     */
    public function index(Request $request) {
        return view('credit_cards.index')->with([
            'cards' => CreditCard::all(),
        ]);
    }
}
