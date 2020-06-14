<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function products(){
        return $this->belongsToMany(App\Product::class);
    }
}
