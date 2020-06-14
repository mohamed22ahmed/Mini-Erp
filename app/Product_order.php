<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_order extends Model
{
    public function product(){
        return $this->belongsTo(App\Product::class);
    }
    public function sell_order(){
        return $this->belongsTo(App\Sell_order::class);
    }
    public function buy_order(){
        return $this->belongsTo(App\Buy_order::class);
    }
}
