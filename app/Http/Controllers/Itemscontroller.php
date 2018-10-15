<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class Itemscontroller extends Controller
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
}
