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
}
