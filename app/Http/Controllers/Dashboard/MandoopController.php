<?php

namespace App\Http\Controllers\Dashboard;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Mandoop;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\MandoopInsert;
use App\Http\Requests\Dashboard\MandoopUpdate;
class MandoopController extends Controller
{
    public function index(){
        $branches=Branch::all();
        $mandoops=Mandoop::all();
        return view('dashboard.mandoop_delivery.mandoop',compact('branches','mandoops'));
    }

    public function insert(MandoopInsert $request){
        $x=new Mandoop;
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->percentage=$request->percentage;

        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/mandoop');
    }

    function update(Request $request){
        $request->validate([
            'name'=>'required',
            'branch_id'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'percentage'=>'required|numeric',
            'email'=>'required|email'
        ]);

        $x=Mandoop::find($request->id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->percentage=$request->percentage;

        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/mandoop');
    }

    public function del($id){
        Mandoop::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Mandoop::find($id);
        if($x->is_active==1)
            $x->is_active=0;
        else
            $x->is_active=1;
        $x->save();
        return redirect()->back();
    }
}
