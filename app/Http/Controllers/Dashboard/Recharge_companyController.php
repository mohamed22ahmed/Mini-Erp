<?php

namespace App\Http\Controllers\Dashboard;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Recharge_company;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\RechargeCompanyInsert;
use App\Http\Requests\Dashboard\RechargeCompanyUpdate;
class Recharge_companyController extends Controller
{
    public function index(){
        $rech_companies=Recharge_company::all();
        $branches=Branch::all();
        return view('dashboard.Recharge.recharge_companies',compact('rech_companies','branches'));
    }

    public function insert(RechargeCompanyInsert $request){

        $x=new Recharge_company;
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->save();

        return redirect('/dashboard/recharge_company');
    }

    function update(Request $request){
        $request->validate([
            'branch_id'=>'required',
            'name'=>'required|alpha',
            'address'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email'
        ]);
        dd($request->all());
        $x=Recharge_company::find($request->id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->save();
        return redirect('/dashboard/recharge_company');
    }

    public function del($id){
        Recharge_company::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Recharge_company::find($id);
        // dd($x);
        if($x->is_active==1)
            $x->is_active=0;
        else
            $x->is_active=1;
        $x->save();
        return redirect()->back();
    }
}
