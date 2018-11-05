<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        return view('user', [
            'user' => $user,
        ]);
    }
}
