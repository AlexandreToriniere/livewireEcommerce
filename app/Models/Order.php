<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongTo('App\User');
    }

    public function products(){
        return $this->belongsToMany(App\Product)->withPivot('quantity');
    }
}
