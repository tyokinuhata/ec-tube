<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
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

    public function detail($id)
    {
        return view('detail', [
            'id' => $id,
        ]);
    }

    public function cart()
    {
        return view('cart');
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
