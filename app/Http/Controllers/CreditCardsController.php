<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CreditCard;
use App\CreditCardCategory;

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

    /**
     * Delete a credit card
     *
     * DELETE /credit_card/{id}
     */
     public function delete(Request $request, $id) {
         $credit_card = CreditCard::find($id);
         $name = $credit_card->name;
         $credit_card->delete();

         return redirect('/credit_cards')->with('alert', 'The credit card '.$name.' was deleted.');
     }

    /**
     * Calculate the optimal credit card reward strategy.
     *
     * POST /calculate
     */
    public function calculate(Request $request) {
        $credit_cards = \Request::get('credit_cards');

        if(!$credit_cards) {
            return redirect('/')->with('alert-danger', 'You must select at least one credit card');
        }

        $credit_cards = array_values($credit_cards);

        $results = CreditCardCategory::with('category', 'credit_card')->whereIn('credit_card_id', $credit_cards)->orderBy('earn_rate', 'desc')->get()->groupBy('category_id');

        $max_earn = [];

        foreach($results as $result) {
            array_push($max_earn, $result->first());
        }

        return view('credit_cards.calculate')->with([
            'results' => $max_earn,
        ]);
    }
}
