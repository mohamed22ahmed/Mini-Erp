<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{

    protected $fillable=['admin_id', 'name', 'address', 'email', 'phone'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function stores(){
        return $this->hasMany(Store::class);
    }

    public function clients(){
        return $this->hasMany(Client::class);
    }

    public function providers(){
        return $this->hasMany(Provider::class);
    }

    public function mandoops(){
        return $this->hasMany(Mandoop::class);
    }

    public function deliveries(){
        return $this->hasMany(App\Delivery::class);
    }

    public function buy_orders(){
        return $this->hasMany(App\Buy_order::class);
    }

    public function sell_orders(){
        return $this->hasMany(App\Sell_order::class);
    }

    public function income_out_operations(){
        return $this->hasMany(App\Income_out_operation::class);
    }

    public function recharge_companies(){
        return $this->hasMany(App\Recharge_company::class);
    }

}
