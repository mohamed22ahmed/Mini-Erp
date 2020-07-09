<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){
        $stores=Store::all();
        $admins=Admin::all();
        $branches=Branch::all();
        return view('dashboard.stores.stores',compact('stores','admins','branches'));
    }
    public function insert(Request $request){
        $request->validate([
            'branch_id'=>'required',
            'admin_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric'
        ]);

        $x=new Store;
        $x->branch_id=$request->branch_id;
        $x->admin_id=$request->admin_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/store');
    }

    function update(Request $request,$id){
        $request->validate([
            'branch_id'=>'required',
            'admin_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric'
        ]);

        $x=Store::find($request->id);
        $x->branch_id=$request->branch_id;
        $x->admin_id=$request->admin_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/store');
    }

    public function del($id){
        Store::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Store::find($id);
        // dd($x);
        if($x->is_active==1)
            $x->is_active=0;
        else
            $x->is_active=1;
        $x->save();
        return redirect()->back();
    }
}
