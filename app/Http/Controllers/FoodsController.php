<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodsController extends Controller
{
    public function index()
    {
        return view('foods.index');
    }

    public function get()
    {
        $foods = Food::all();
        return json_encode($foods);
    }

    public function add(Request $request)
    {
//        return redirect('/foods');
    }

    public function cart()
    {
        return view('foods.cart');
    }
}
