<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
use DataTables;
use Validator;

class BranchController extends Controller
{
    function index(){
        $admins = Admin::all();
        return view('dashboard.basics.branches', compact('admins'));
    }

    function getdata(){
        $branches = Branch::all();
        if(request()->ajax()){
            return Datatables::of($branches)
            ->addColumn('action', function($branch){
                return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$branch->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-'.($branch->is_active ?"success":"danger").' active" id="'.$branch->id.'"><i class="glyphicon glyphicon-active"></i> '.($branch->is_active ?"Active":"Inactive").'</a>';
            })
            ->make(true);
        }
    }

    function postdata(Request $request){
        $validation = Validator::make($request->all(), [
            'name'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $testName=Branch::where('name',$request->name)->first();
                if(!$testName){
                    $branch=new Branch;
                    $branch->admin_id=$request->admin_id;
                    $branch->name=$request->name;
                    $branch->address = $request->address;
                    $branch->phone = $request->phone;
                    $branch->email = $request->email;
                    if($request->notes)
                        $branch->notes=$request->notes;

                    $branch->save();
                    $success_output = '<div class="alert alert-success">Data Inserted</div>';
                }
                else
                    array_push($error_array,'Data Exist');
            }

            if($request->get('button_action') == 'update')
            {
                $branch = Branch::find($request->get('student_id'));
                $isChanged = false;
                if($branch->admin_id!=$request->admin_id){
                    $testName=Branch::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if($branch->name!=$request->name){
                    $testName=Branch::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if(!$isChanged)
                {
                    $branch->admin_id=$request->admin_id;
                    $branch->name = $request->name;
                    $branch->address = $request->address;
                    $branch->phone = $request->phone;
                    $branch->email = $request->email;
                    if($request->notes)
                        $branch->notes = $request->notes;
                    $branch->save();
                    $success_output = '<div class="alert alert-success">Data Updated</div>';
                }
            }
        }

        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $student = Branch::find($id);
        // dd($id);
        $output = array(
            'admin_id'    =>  $student->admin_id,
            'name'     =>  $student->name,
            'address'     =>  $student->address,
            'phone'     =>  $student->phone,
            'email'     =>  $student->email
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $branch = Branch::find($request->input('id'));
        $str=$branch->stores;

        if(count($str)){
            echo "This data can't be removed because it related with another data";
            return;
        }

        if($branch->delete()){
            echo 'Data Deleted';
        }

    }

    function active(Request $request){
        $student = Branch::find($request->id);
        if($student->is_active==1)
            $student->is_active=0;
        else
            $student->is_active=1;

        $student->save();
    }
}
