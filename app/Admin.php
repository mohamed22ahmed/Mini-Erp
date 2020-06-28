<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public function branches(){
        return $this->hasMany(Branch::class);
    }

    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function store_transfers(){
        return $this->hasMany(Store_transfer::class);
    }

    public function buy_orders(){
        return $this->hasMany(Buy_order::class);
    }

    public function sell_orders(){
        return $this->hasMany(Sell_order::class);
    }

    public function income_out_operations(){
        return $this->hasMany(Income_out_operation::class);
    }

    public function branch(){
        return $this->hasOne(Branch::class);
    }
}
