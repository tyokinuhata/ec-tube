<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartsStoreRequest;
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

        return view('carts.index', [
            'carts' => $carts,
        ]);
    }

    public function arigato()
    {
        return view('carts.arigato');
    }

    public function store(CartsStoreRequest $request)
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

    public function oaiso()
    {
        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect('/carts/arigato');
    }
}
