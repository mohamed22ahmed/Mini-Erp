<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public function products(){
        return $this->belongsToMany(App\Product::class);
    }
}
