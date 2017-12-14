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

        $existing = CreditCardCategory::where('credit_card_id', '=', $id)
            ->pluck('category_id');

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

        return redirect("/credit_cards/$id/categories")->with(
            'alert', 'Category with earn rate '.$request->input('earn_rate').' was added.'
        );
    }

    /**
     * Edit a credit card category
     *
     * GET /credit_cards/{{ credit_card_id }}/categories/{{ category_id }}/edit
     */
    public function edit(Request $request, $credit_card_id, $category_id) {
        $ccc = CreditCardCategory::with('category')
            ->where('credit_card_id', '=', $credit_card_id)
            ->where('category_id','=',$category_id)->first();

        $category = $ccc->category;

        return view('credit_cards.edit_category')->with([
            'category'       => $category,
            'credit_card_id' => $credit_card_id,
            'earn_rate'      => $ccc->earn_rate,
            'category_id'    => $category_id,
            'ccc'            => $ccc,
        ]);
    }

    /**
     * Update a credit card category
     *
     * PUT /credit_cards/{{ credit_card_id }}/categories/{{ category_id }}
     */
    public function update(Request $request, $credit_card_id, $category_id) {

        $this->validate($request, [
            'earn_rate'      => 'regex:/[0-9]+(\.[0-9][0-9]?)?/',
        ]);

        # Update the earn rate
        CreditCardCategory::with('category')
            ->where('credit_card_id', '=', $credit_card_id)
            ->where('category_id','=',$category_id)
            ->update(['earn_rate'=>$request->input('earn_rate')]);

        return redirect("/credit_cards/$credit_card_id/categories")
            ->with('alert', 'The credit card category was updated.');
    }

    /**
     * Delete category/cc assocation
     *
     * DELETE /credit_cards/{credit_card_id}/categories/{category_id}
     */
    public function delete(Request $request, $credit_card_id, $category_id) {
        $ccc = CreditCardCategory::with('category')
            ->where('credit_card_id', '=', $credit_card_id)
            ->where('category_id','=',$category_id)
            ->first();

        $name = $ccc->category->name;

        # Delete the record, can't just call delete :-(
        CreditCardCategory::with('category')
            ->where('credit_card_id', '=', $credit_card_id)
            ->where('category_id','=',$category_id)
            ->delete();

        return redirect("/credit_cards/$credit_card_id/categories")
            ->with('alert', "$name was deleted.");
    }
}
