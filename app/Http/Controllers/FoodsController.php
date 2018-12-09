<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Cart;
use Auth;

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
        Cart::updateOrCreate([
            'user_id' => $request->user_id,
            'food_id' => $request->food_id,
        ],[
            'number' => $request->number,
            'user_id' => $request->user_id,
            'food_id' => $request->food_id,
        ]);
    }

    public function carts()
    {
        $carts = Cart::whereHas('user', function ($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        $carts->total_price = $carts->sum(function ($cart) {
            return $cart->number * $cart->food->price;
        });

        return view('foods.cart', [
            'carts' => $carts,
        ]);
    }
}
