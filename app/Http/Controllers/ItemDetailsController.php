<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemDetailsController extends Controller
{
    public function detail($id)
    {
        return view('detail', [
            'id' => $id,
        ]);
    }
}
