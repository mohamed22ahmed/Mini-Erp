<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income_out_operation extends Model
{
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function income_out(){
        return $this->belongsTo(Income_out::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
