<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_order extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function sell_order(){
        return $this->belongsTo(Sell_order::class);
    }
    public function buy_order(){
        return $this->belongsTo(Buy_order::class);
    }
}
