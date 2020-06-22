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
        return view('dashboard.basics.in_outs');
    }

    function getdata(){
        $in_outs = Income_out::all();
        if(request()->ajax()){
            return Datatables::of($in_outs)
            ->addColumn('action', function($in_out){
                return '<a href="#" class="btn btn-xl btn-primary edit" id="'.$in_out->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xl btn-danger delete" id="'.$in_out->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    <a href="#" class="btn btn-xl btn-'.($in_out->is_active ?"success":"danger").' active" id="'.$in_out->id.'"><i class="glyphicon glyphicon-active"></i> '.($in_out->is_active ?"Active":"Inactive").'</a>';
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
                $testName=Unit::where('name',$request->name)->first();
                if(!$testName){
                    $in_out=new In_out;
                    $in_out->name=$request->name;
                    if($request->notes)
                        $in_out->notes=$request->notes;
                    $in_out->save();
                    $success_output = '<div class="alert alert-success">Data Inserted</div>';
                }
                else
                    array_push($error_array,'Data Exist');
            }

            if($request->get('button_action') == 'update'){
                $isChanged = false;
                if($in_out->name!=$request->name){
                    $testName=in_out::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if(!$isChanged){
                    $in_out->name = $request->name;
                    if($request->notes)
                        $in_out->notes = $request->notes;
                    $in_out->save();
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
        $id = $request->id;
        $in_out = Income_out::find($id);
        // dd($id);
        $output = array(
            'name'     =>  $in_out->name,
            'notes'     =>  $in_out->notes
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $in_out = Income_out::find($request->id);
        if($in_out->delete()){
            echo 'Data Deleted';
        }
    }

    function active(Request $request){
        $in_out = Income_out::find($request->id);
        if($in_out->is_active==1)
            $in_out->is_active=0;
        else
            $in_out->is_active=1;

        $in_out->save();
    }
}
