<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge_value extends Model
{

    public function company(){
        return $this->belongsTo(App\Company::class);
    }

    public function city(){
        return $this->belongsTo(App\City::class);
    }
}
