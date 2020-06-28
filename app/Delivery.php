<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function sell_orders(){
        return $this->hasMany(Sell_order::class);
    }
}
