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
            'cards' => CreditCard::orderBy('name')->get(),
        ]);
    }


    /**
     * Create a new credit card
     *
     * GET /credit_cards/new
     */
    public function create() {
        return view('credit_cards.create');
    }

    /**
     * Store a new credit card
     *
     * POST /credit_cards
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'  => 'required|min:3',
        ]);

        $credit_card = new CreditCard();
        $credit_card->name = $request->input('name');
        $credit_card->save();

        return redirect('/credit_cards')->with('alert', 'The credit card '.$request->input('name').' was added.');
    }

}
