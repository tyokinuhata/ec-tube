<?php

namespace App\Http\Controllers;

use Auth;

class UserController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        return json_encode($user);
    }
}
