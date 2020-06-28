<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy_order extends Model
{
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function product_orders(){
        return $this->hasMany(Product_order::class);
    }
}
