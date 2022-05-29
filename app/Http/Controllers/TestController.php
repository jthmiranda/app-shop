<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function welcome() {
        $products = Product::all();
        return view('welcome')->with(compact('products'));
    }
}
