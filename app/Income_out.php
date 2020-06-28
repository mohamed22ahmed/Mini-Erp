<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income_out extends Model
{
    public function income_out_operations(){
        return $this->hasMany(Income_out_operation::class);
    }
}
