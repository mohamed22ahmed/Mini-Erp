<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function branch(){
        return $this->belongsTo(App\Branch::class);
    }

    public function sell_orders(){
        return $this->hasMany(App\Sell_order::class);
    }
}
