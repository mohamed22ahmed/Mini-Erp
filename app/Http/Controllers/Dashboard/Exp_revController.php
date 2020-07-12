<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Income_out;
use App\Income_out_operation;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ExpRevInsert;
class Exp_revController extends Controller
{
    public function index(){
        $exps=Income_out_operation::all();
        $in_out=Income_out::all();
        $branches=Branch::all();
        $admins=Admin::all();
        return view('dashboard.expenses.incomes_out_operations',compact('exps','in_out','branches','admins'));
    }

    public function insert(ExpRevInsert $request){
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

    function update(Request $request){
        $request->validate([
            'in_id'=>'required',
            'branch_id'=>'required',
            'admin_id'=>'required',
            'operation_date'=>'required|date',
            'type'=>'required',
            'value'=>'required|numeric',
        ]);

        $x=Income_out_operation::find($request->id);
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
