<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function store(){
        return $this->belongsTo(App\Store::class);
    }

    public function category(){
        return $this->belongsTo(App\Category::class);
    }

    public function colors(){
        return $this->belongsToMany(App\Color::class);
    }

    public function discounts(){
        return $this->belongsToMany(App\Discount::class);
    }

    public function units(){
        return $this->belongsToMany(App\Unit::class);
    }

    public function store_transfer_products(){
        return $this->hasMany(App\Store_transfer_product::class);
    }

    public function product_orders(){
        return $this->hasMany(App\Product_order::class);
    }
}
