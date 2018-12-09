<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartsController extends Controller
{
    public function index()
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

    public function store(Request $request)
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
}
