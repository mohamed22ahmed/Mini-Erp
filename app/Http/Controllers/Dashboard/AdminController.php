<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\AdminInsert;
class AdminController extends Controller
{
    public function index(){
        $admins=Admin::all();
        $branches=Branch::all();
        return view('dashboard.administrator.admins',compact('admins','branches'));
    }

    public function insert(AdminInsert $request){
        $x=new Admin;
        // $x->branch_id=$request->branch_id;
        $x->username=$request->name;
        $x->password=$request->password;
        $x->email=$request->email;
        $x->super_admin=$request->admin_type;
        $x->save();

        return redirect('/dashboard/admins');
    }

    function update(Request $request){
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            // 'branch_id'=>'required',
            // 'password'=>'required',
            'email'=>'required|email',
            'admin_type'=>'required'
        ]);

        $x=Admin::find($request->id);
        // $x->branch_id=$request->branch_id;
        $x->username=$request->name;
        if($request->password)
            $x->password=$request->password;
        $x->email=$request->email;
        $x->super_admin=$request->admin_type;
        $x->save();

        return redirect('/dashboard/admins');
    }

    public function del($id){
        Admin::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Admin::find($id);
        // dd($x);
        if($x->is_active==1)
            $x->is_active=0;
        else
            $x->is_active=1;
        $x->save();
        return redirect()->back();
    }
}
