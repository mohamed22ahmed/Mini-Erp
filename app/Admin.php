<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function branches(){
        return $this->hasMany(App\Branch::class);
    }

    public function stores(){
        return $this->hasMany(App\Store::class);
    }

    public function store_transfers(){
        return $this->hasMany(App\Store_transfer::class);
    }

    public function buy_orders(){
        return $this->hasMany(App\Buy_order::class);
    }

    public function sell_orders(){
        return $this->hasMany(App\Sell_order::class);
    }

    public function income_out_operations(){
        return $this->hasMany(App\Income_out_operation::class);
    }

    public function branch(){
        return $this->hasOne(App\Branch::class);
    }
}
