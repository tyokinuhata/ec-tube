<?php

namespace App\Http\Controllers;

use App\Models\Food;

class FoodsController extends Controller
{
    public function index()
    {
        return view('foods.index');
    }

    public function list()
    {
        $foods = Food::select('id', 'name', 'description', 'img', 'price')->get();
        return json_encode($foods);
    }
}
