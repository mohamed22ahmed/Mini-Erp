<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store_transfer extends Model
{
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function toStore(){
        return $this->belongsTo(Store::class,"to_store");
    }

    public function fromStore(){
        return $this->belongsTo(Store::class,"from_store");
    }
}
