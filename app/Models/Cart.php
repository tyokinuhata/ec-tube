<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [ 'number', 'user_id', 'food_id', ];

    public function food()
    {
        return $this->belongsTo('App\Models\Food');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
