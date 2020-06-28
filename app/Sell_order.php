<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell_order extends Model
{
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }

    public function mandoop(){
        return $this->belongsTo(Mandoop::class);
    }

    public function recharge_company(){
        return $this->belongsTo(Recharge_company::class);
    }

    public function product_orders(){
        return $this->hasMany(Product_order::class);
    }
}
