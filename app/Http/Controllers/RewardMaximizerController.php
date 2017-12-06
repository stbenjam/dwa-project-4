<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CreditCard;

class RewardMaximizerController extends Controller
{

    /**
     * Index page for credit card list
     *
     * GET /
     */
    public function index(Request $request) {
        return view('index')->with([
            'cards' => CreditCard::orderBy('name')->get(),
        ]);
    }

}
