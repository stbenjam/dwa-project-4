<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CreditCardCategory;
use App\CreditCard;
use App\Category;

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
     * Create a new credit card category
     *
     * GET /credit_cards/{id}/categories/new
     */
    public function create($id) {
        $credit_card = CreditCard::find($id);

        $existing = CreditCardCategory::where('credit_card_id', '=', $id)->pluck('category_id');

        return view('credit_cards.create_category')->with([
            'id'          => $id,
            'categories'  => Category::whereNotIn('id', $existing)->get(),
            'credit_card' => $credit_card,
        ]);
    }

    /**
     * Store a new credit card category
     *
     * POST /credit_cards/$id/categories
     */
    public function store(Request $request, $id) {
        $this->validate($request, [
            'category_id'    => 'required|integer',
            'earn_rate'      => 'regex:/[0-9]+(\.[0-9][0-9]?)?/',
        ]);

        $card_category = new CreditCardCategory();
        $card_category->credit_card_id = $id;
        $card_category->category_id = $request->input('category_id');
        $card_category->earn_rate = $request->input('earn_rate');
        $card_category->save();

        return redirect("/credit_cards/$id/categories")->with('alert', 'Category with earn rate '.$request->input('earn_rate').' was added.');
    }


    /**
     * Delete category/cc assocation
     *
     * DELETE /credit_cards/{credit_card_id}/categories/{category_id}
     */
    public function delete(Request $request, $credit_card_id, $category_id) {

         $ccc = CreditCardCategory::with('category')->where('credit_card_id', '=', $credit_card_id)->where('category_id','=',$category_id)->first();
         $name = $ccc->category->name;
         CreditCardCategory::with('category')->where('credit_card_id', '=', $credit_card_id)->where('category_id','=',$category_id)->delete();

         return redirect("/credit_cards/$credit_card_id/categories")->with('alert', "$name was deleted.");
    }
}
