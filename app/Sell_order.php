<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell_order extends Model
{
    public function admin(){
        return $this->belongsTo(App\Admin::class);
    }

    public function branch(){
        return $this->belongsTo(App\Branch::class);
    }

    public function client(){
        return $this->belongsTo(App\Client::class);
    }

    public function store(){
        return $this->belongsTo(App\Store::class);
    }

    public function city(){
        return $this->belongsTo(App\City::class);
    }

    public function delivery(){
        return $this->belongsTo(App\Delivery::class);
    }

    public function mandoop(){
        return $this->belongsTo(App\Mandoop::class);
    }

    public function recharge_company(){
        return $this->belongsTo(App\Recharge_company::class);
    }

    public function product_orders(){
        return $this->hasMany(App\Product_order::class);
    }
}
