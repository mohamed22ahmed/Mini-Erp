<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge_value extends Model
{

    public function company(){
        return $this->belongsTo(Recharge_company::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
