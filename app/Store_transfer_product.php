<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_transfer_product extends Model
{
    public function product(){
        return $this->belongsTo(App\Product::class);
    }

    public function store(){
        return $this->belongsTo(App\Store::class);
    }
}
