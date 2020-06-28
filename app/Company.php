<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function recharge_values(){
        return $this->hasMany(Recharge_value::class);
    }

}
