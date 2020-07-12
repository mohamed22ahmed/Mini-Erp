<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use App\Http\Controllers\Controller;
use App\Recharge_company;
use App\Recharge_value;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\RechargeValueInsert;
use App\Http\Requests\Dashboard\RechargeValueUpdate;
class Recharge_valueController extends Controller
{
    public function index(){
        $rech_values=Recharge_value::with("rec_company")->get();
        $cities=City::all();
        $companies=Recharge_company::all();
        return view('dashboard.Recharge.recharge_values',compact('rech_values','cities','companies'));
    }

    public function insert(RechargeValueInsert $request){
        $x=new Recharge_value;
        $x->Rec_company_id=(int)$request->company_id;
        $x->city_id=(int)$request->city_id;
        $x->value=$request->value;
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/recharge_value');
    }

    function update(RechargeValueUpdate $request){
        $x=Recharge_value::find($request->id);
        $x->Rec_company_id=(int)$request->company_id;
        $x->city_id=(int)$request->city_id;
        $x->value=$request->value;
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/recharge_value');
    }

    public function del($id){
        Recharge_value::find($id)->delete();
        return redirect()->back();
    }

}
