<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [ 'number', 'user_id', 'food_id', ];
}
