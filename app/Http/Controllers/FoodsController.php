<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodsController extends Controller
{
    public function index()
    {
        $foods = Food::all();

        return view('foods.index', [
            'foods' => $foods
        ]);
    }

    public function cart()
    {
        return view('foods.cart');
    }

    public function add(Request $request)
    {
        // TODO: 手抜き実装です。許してください。
//        $item = $request->item;
//        $carts = User::select('carts')->where('id', Auth::id())->first()->carts;
//        $carts .= $item . ',';
//        User::where('id', Auth::id())->update([
//            'carts' => $carts
//        ]);
//        return redirect('/foods');
    }
}
