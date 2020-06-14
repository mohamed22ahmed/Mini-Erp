<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Income_out;
use DataTables;
use Validator;

class In_outController extends Controller
{
    function index(){
        return view('dashboard.in_outs');
    }

    function getdata(){
        $branches = Income_out::all();
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
                $x=new Income_out;
                $x->name=$request->name;
                if($request->notes)
                    $x->notes=$request->notes;

                $x->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $student = Income_out::find($request->get('student_id'));
                $student->name = $request->name;
                if($request->notes)
                    $student->notes = $request->notes;
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
        $student = Income_out::find($id);
        // dd($id);
        $output = array(
            'name'     =>  $student->name,
            'notes'     =>  $student->notes
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $student = Income_out::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }

    function active(Request $request){
        $student = Income_out::find($request->input('id'));
        if($student->is_active==1)
            $student->is_active=0;
        else
            $student->is_active=1;

        $student->save();
    }
}
