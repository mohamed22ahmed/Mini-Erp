<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recharge_value extends Model
{

    public function rec_company(){
        return $this->belongsTo(Recharge_company::class,"Rec_company_id");
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
