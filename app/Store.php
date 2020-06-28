<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function store_transfers(){
        return $this->hasMany(Store_transfer::class);
    }

    public function store_transfer_products(){
        return $this->hasMany(Store_transfer_product::class);
    }

    public function buy_orders(){
        return $this->hasMany(Buy_order::class);
    }

    public function sell_orders(){
        return $this->hasMany(Sell_order::class);
    }
}
