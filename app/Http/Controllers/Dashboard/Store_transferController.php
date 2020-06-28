<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Store;
use App\Store_transfer;
use Illuminate\Http\Request;

class Store_transferController extends Controller
{
    public function index(){
        $admins=Admin::all();
        $stores=Store::all();
        $transfers=Store_transfer::all();
        return view('dashboard.stores.stores_transfers',compact('admins','stores','transfers'));
    }

    public function insert(Request $request){
        $request->validate([
            'admin_id'=>'required',
            'from_store'=>'required',
            'to_store'=>'required',
            'transfer_date'=>'required|date',
            'product_count'=>'required|numeric'
        ]);

        $x=new Store_transfer;
        $x->admin_id=$request->admin_id;
        $x->from_store=$request->from_store;
        $x->to_store=$request->to_store;
        $x->transfer_date=$request->transfer_date;
        $x->product_count=$request->product_count;
        $x->save();

        return redirect('/dashboard/store_transfer');
    }

    public function edit($id){
        $record=Recharge_company::find($id);
        return redirect('/dashboard/recharge_company',compact('record'));
    }

    function update(Request $request,$id){
        $request->validate([
            'branch_id'=>'required',
            'name'=>'required',
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
        Store_transfer::find($id)->delete();
        return redirect()->back();
    }
}
