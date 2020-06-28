<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use App\Http\Controllers\Controller;
use App\Recharge_company;
use App\Recharge_value;
use App\Company;
use Illuminate\Http\Request;

class Recharge_valueController extends Controller
{
    public function index(){
        $rech_values=Recharge_value::all();
        $cities=City::all();
        $companies=Recharge_company::all();
        return view('dashboard.Recharge.recharge_values',compact('rech_values','cities','companies'));
    }

    public function insert(Request $request){
        $request->validate([
            'company_id'=>'required',
            'city_id'=>'required',
            'value'=>'required'
        ]);
        // dd($request->all());
        $x=new Recharge_value;
        $x->Rec_company_id=(int)$request->company_id;
        $x->city_id=(int)$request->city_id;
        $x->value=$request->value;
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/recharge_value');
    }

    public function edit($id){
        $record=Recharge_company::find($id);
        return redirect('/dashboard/recharge_company',compact('record'));
    }

    function update(Request $request,$id){
        $request->validate([
            'branch_id'=>'required',
            'name'=>'required|alpha',
            'address'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email'
        ]);

        $x=Recharge_company::find($id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->save();

        return redirect('/dashboard/recharge_company');
    }

    public function del($id){
        Recharge_value::find($id)->delete();
        return redirect()->back();
    }

}
