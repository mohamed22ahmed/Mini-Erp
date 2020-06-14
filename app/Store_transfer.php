<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_transfer extends Model
{
    public function admin(){
        return $this->belongsTo(App\Admin::class);
    }

    public function store(){
        return $this->belongsTo(App\Store::class);
    }
}
