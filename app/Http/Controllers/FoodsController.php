<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Auth;

class FoodsController extends Controller
{
    public function index()
    {
        return view('foods.index');
    }

    public function list()
    {
        $foods = Food::all();
        return json_encode($foods);
    }
}
