<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function branch(){
        return $this->belongsTo(App\Branch::class);
    }

    public function buy_orders(){
        return $this->hasMany(App\Buy_order::class);
    }
}
