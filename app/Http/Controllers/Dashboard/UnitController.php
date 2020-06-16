<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Unit;
use DataTables;
use Validator;

class UnitController extends Controller
{
    function index(){
        return view('dashboard.units');
    }

    function getdata(){
        $units = Unit::all();
        if(request()->ajax()){
            return Datatables::of($units)
            ->addColumn('action', function($unit){
                return '<a href="#" class="btn btn-xl btn-primary edit" id="'.$unit->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xl btn-danger delete" id="'.$unit->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    <a href="#" class="btn btn-xl btn-'.($unit->is_active ?"success":"danger").' active" id="'.$unit->id.'"><i class="glyphicon glyphicon-active"></i> '.($unit->is_active ?"Active":"Inactive").'</a>';
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
                    $unit=new Unit;
                    $unit->name=$request->name;
                    if($request->notes)
                        $unit->notes=$request->notes;

                    $unit->save();
                    $success_output = '<div class="alert alert-success">Data Inserted</div>';
                }
                else
                    array_push($error_array,'Data Exist');
            }

            if($request->get('button_action') == 'update')
            {
                $unit = Unit::find($request->get('student_id'));
                $isChanged = false;
                if($unit->name!=$request->name){
                    $testName=Unit::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if(!$isChanged)
                {
                    $unit->name = $request->name;
                    if($request->notes)
                        $unit->notes = $request->notes;
                    $unit->save();
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
        $unit = Unit::find($id);
        // dd($id);
        $output = array(
            'name'     =>  $unit->name,
            'notes'     =>  $unit->notes
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $unit = Unit::find($request->id);
        if($unit->delete())
        {
            echo 'Data Deleted';
        }
    }

    function active(Request $request){
        $unit = Unit::find($request->id);
        if($unit->is_active==1)
            $unit->is_active=0;
        else
            $unit->is_active=1;

        $unit->save();
    }
}
