<?php

namespace App\Http\Controllers\Dashboard;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ProviderInsert;
use App\Http\Requests\Dashboard\ProviderUpdate;
class ProviderController extends Controller
{
    public function index(){
        $branches=Branch::all();
        $providers=Provider::all();
        return view('dashboard.clients_providers.provider',compact('branches','providers'));
    }

    public function insert(ProviderInsert $request){
        $x=new Provider;
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/provider');
    }

    function update(ProviderUpdate $request){
        $x=Provider::find($request->id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/provider');
    }

    public function del($id){
        Provider::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Provider::find($id);
        // dd($x);
        if($x->is_active==1)
            $x->is_active=0;
        else
            $x->is_active=1;
        $x->save();
        return redirect()->back();
    }
}
