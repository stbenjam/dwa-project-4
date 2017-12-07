<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{

    /**
     * Index page for categories list
     *
     * GET /
     */
    public function index(Request $request) {
        return view('categories.index')->with([
            'categories' => Category::all(),
        ]);
    }

    /**
     * Create a new credit card
     *
     * GET /categories/new
     */
    public function create() {
        return view('categories.create');
    }

    /**
     * Store a new credit card
     *
     * POST /categories
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'  => 'required|min:3',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect('/categories')->with('alert', 'The category '.$request->input('name').' was added.');
    }

    /**
     * Delete a credit card
     *
     * DELETE /category/{id}
     */
     public function delete(Request $request, $id) {
         $category = Category::find($id);
         $name = $category->name;

         $category->delete();

         return redirect('/categories')->with('alert', 'The category '.$name.' was deleted.');
     }
}
