<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request) {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")->paginate(5);
        return view('search.show')->with(compact('products', 'query'));
    }
}
