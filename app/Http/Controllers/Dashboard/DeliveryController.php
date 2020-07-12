<?php

namespace App\Http\Controllers\Dashboard;

use App\Branch;
use App\Delivery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\CompanyUpdate;
class DeliveryController extends Controller
{
    public function index(){
        $branches=Branch::all();
        $deliveries=Delivery::all();
        return view('dashboard.mandoop_delivery.delivery',compact('branches','deliveries'));
    }

    public function insert(Request $request){
        $request->validate([
            'name'=>'required',
            'branch_id'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'salary'=>'required|numeric',
            'email'=>'required|email'
        ]);

        $x=new Delivery;
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->salary=$request->salary;

        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/delivery');
    }

    function update(Request $request){
        $request->validate([
            'name'=>'required',
            'branch_id'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'salary'=>'required|numeric',
            'email'=>'required|email'
        ]);

        $x=Delivery::find($request->id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->salary=$request->salary;

        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/delivery');
    }

    public function del($id){
        Delivery::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Delivery::find($id);
        // dd($x);
        if($x->is_active==1)
            $x->is_active=0;
        else
            $x->is_active=1;
        $x->save();
        return redirect()->back();
    }
}
