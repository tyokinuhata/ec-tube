<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items', [
            'items' => $items
        ]);
    }

    public function add(Request $request)
    {
        // TODO: 手抜き実装です。許してください。
        $item = $request->item;
        $carts = User::select('carts')->where('id', Auth::id())->first()->carts;
        $carts .= $item . ',';
        User::where('id', Auth::id())->update([
            'carts' => $carts
        ]);
        return redirect('/items');
    }
}