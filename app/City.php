<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function recharge_values(){
        return $this->hasMany(App\Recharge_value::class);
    }

    public function sell_orders(){
        return $this->hasMany(App\Sell_order::class);
    }
}
