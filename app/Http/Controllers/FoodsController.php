<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Cart;

class FoodsController extends Controller
{
    public function index()
    {
        return view('foods.index');
    }

    public function foods()
    {
        $foods = Food::all();
        return json_encode($foods);
    }

    public function add(Request $request)
    {

        $hoge = Cart::create([
            'number' => $request->number,
            'user_id' => $request->id,
        ]);
        dd($hoge);
    }

    public function cart(Request $request)
    {
        Cart::create([
            'id' => $request->id,
            'number' => $request->number,
        ]);

        return view('foods.cart');
    }
}
