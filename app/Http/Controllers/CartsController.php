<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
use DB;

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
            'number' =>
                is_null($number = Cart::select('number')->where('user_id', $request->user_id)->where('food_id', $request->food_id)->first()) ?
                    $request->number
                :
                    $number->number + $request->number,
            'user_id' => $request->user_id,
            'food_id' => $request->food_id,
        ]);
    }

    public function count()
    {
        $carts = Cart::select('number')->whereHas('user', function ($query) {
            $query->where('id', Auth::user()->id);
        })->get();

        $count = $carts->sum(function ($cart) {
            return $cart->number;
        });

        return $count;
    }
}
