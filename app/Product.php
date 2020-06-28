<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    public function discounts(){
        return $this->belongsToMany(Discount::class);
    }

    public function units(){
        return $this->belongsToMany(Unit::class);
    }

    public function store_transfer_products(){
        return $this->hasMany(Store_transfer_product::class);
    }

    public function product_orders(){
        return $this->hasMany(Product_order::class);
    }
}
