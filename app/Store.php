<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function admin(){
        return $this->belongsTo(App\Admin::class);
    }

    public function branch(){
        return $this->belongsTo(App\Branch::class);
    }

    public function products(){
        return $this->hasMany(App\Product::class);
    }

    public function store_transfers(){
        return $this->hasMany(App\Store_transfer::class);
    }

    public function store_transfer_products(){
        return $this->hasMany(App\Store_transfer_product::class);
    }

    public function buy_orders(){
        return $this->hasMany(App\Buy_order::class);
    }

    public function sell_orders(){
        return $this->hasMany(App\Sell_order::class);
    }
}
