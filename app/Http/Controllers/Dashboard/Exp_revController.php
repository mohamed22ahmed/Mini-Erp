<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Income_out;
use App\Income_out_operation;
use Illuminate\Http\Request;


class Exp_revController extends Controller
{
    public function index(){
        $exps=Income_out_operation::all();
        $in_out=Income_out::all();
        $branches=Branch::all();
        $admins=Admin::all();
        return view('dashboard.expenses.incomes_out_operations',compact('exps','in_out','branches','admins'));
    }

    public function insert(Request $request){
        // dd($request->all());
//         "in_id" => "1"
//   "branch_id" => "1"
//   "admin_id" => "1"
//   "operation_date" => "test Operation"
//   "value" => "0"
//   "type" => "in"
//   "description" => null
        $request->validate([
            'in_id'=>'required',
            'branch_id'=>'required',
            'admin_id'=>'required',

            'operation_date'=>'required|date',
            'type'=>'required',
            'value'=>'required|numeric',
        ]);
        // dd($request->all());
        $x=new Income_out_operation;
        $x->income_out_id=$request->in_id;
        $x->admin_id=$request->admin_id;
        $x->branch_id=$request->branch_id;
        $x->operation_date=$request->operation_date;
        $x->value=$request->value;
        $x->type=$request->type;
        if($request->description)
            $x->description=$request->description;
        $x->save();

        return redirect('/dashboard/exp_rev');
    }

    public function edit($id){
        $record=Income_out_operation::find($id);
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

        $x=Income_out_operation::find($id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->save();

        return redirect('/dashboard/recharge_company');
    }

    public function del($id){
        Income_out_operation::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Income_out_operation::find($id);
        // dd($x);
        if($x->is_confirmed==1)
            $x->is_confirmed=0;
        else
            $x->is_confirmed=1;
        $x->save();
        return redirect()->back();
    }
}
