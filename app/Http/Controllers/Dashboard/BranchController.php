<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;
use DataTables;
use Validator;

class BranchController extends Controller
{
    function index(){
        return view('dashboard.branches');
    }

    function getdata(){
        $branches = Branch::all();

        if(request()->ajax()){
            return Datatables::of($branches)
            ->addColumn('action', function($branch){
                return '<a href="#" class="btn btn-xl btn-primary edit" id="'.$branch->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xl btn-danger delete" id="'.$branch->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    <a href="#" class="btn btn-xl btn-'.($branch->is_active ?"success":"danger").' active" id="'.$branch->id.'"><i class="glyphicon glyphicon-active"></i> '.($branch->is_active ?"Active":"Inactive").'</a>';
            })
            ->make(true);
        }
    }

    function postdata(Request $request){
        $validation = Validator::make($request->all(), [
            'admin_id' => 'required',
            'name'  => 'required',
            'address'  => 'required',
            'phone'  => 'required',
            'email'  => 'required',
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
                $student = new Branch([
                    'admin_id'    =>  $request->admin_id,
                    'name'     =>  $request->name,
                    'address'     =>  $request->address,
                    'phone'     =>  $request->phone,
                    'email'     =>  $request->email
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $student = Branch::find($request->get('student_id'));
                $student->admin_id = $request->admin_id;
                $student->name = $request->name;
                $student->address = $request->address;
                $student->phone = $request->phone;
                $student->email = $request->email;
                $student->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
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
            echo "Error";
            return;
        }

        if($branch->delete()){
            echo 'Data Deleted';
        }

    }

    function active(Request $request){
        $student = Branch::find($request->input('id'));
        if($student->is_active==1)
            $student->is_active=0;
        else
            $student->is_active=1;

        $student->save();
    }
}
