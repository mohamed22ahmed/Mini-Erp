<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy_order extends Model
{
    public function admin(){
        return $this->belongsTo(App\Admin::class);
    }

    public function branch(){
        return $this->belongsTo(App\Branch::class);
    }

    public function provider(){
        return $this->belongsTo(App\Provider::class);
    }

    public function store(){
        return $this->belongsTo(App\Store::class);
    }

    public function product_orders(){
        return $this->hasMany(App\Product_order::class);
    }
}
