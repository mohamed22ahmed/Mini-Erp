<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge_company extends Model
{
    public function sell_orders(){
        return $this->hasMany(Sell_order::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
