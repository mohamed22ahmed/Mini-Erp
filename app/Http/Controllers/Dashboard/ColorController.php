<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use DataTables;
use Validator;

class ColorController extends Controller
{
    function index(){
        return view('dashboard.basics.colors');
    }

    function getdata(){
        $colors = Color::all();
        if(request()->ajax()){
            return Datatables::of($colors)
            ->addColumn('action', function($color){
                return '<a href="#" class="btn btn-xl btn-primary edit" id="'.$color->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xl btn-danger delete" id="'.$color->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    <a href="#" class="btn btn-xl btn-'.($color->is_active ?"success":"danger").' active" id="'.$color->id.'"><i class="glyphicon glyphicon-active"></i> '.($color->is_active ?"Active":"Inactive").'</a>';
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
                $testName=Color::where('name',$request->name)->first();
                if(!$testName){
                    $color=new Color;
                    $color->name=$request->name;
                    if($request->notes)
                        $color->notes=$request->notes;

                    $color->save();
                    $success_output = '<div class="alert alert-success">Data Inserted</div>';
                }
                else
                    array_push($error_array,'Data Exist');
            }

            if($request->get('button_action') == 'update')
            {
                $color = Color::find($request->get('student_id'));
                $isChanged = false;
                if($color->name!=$request->name){
                    $testName=Color::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if(!$isChanged)
                {
                    $color->name = $request->name;
                    if($request->notes)
                        $color->notes = $request->notes;
                    $color->save();
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
        $color = Color::find($id);
        // dd($id);
        $output = array(
            'name'     =>  $color->name,
            'notes'     =>  $color->notes
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $color = Color::find($request->input('id'));
        if($color->delete())
        {
            echo 'Data Deleted';
        }
    }

    function active(Request $request){
        $color = Color::find($request->input('id'));
        if($color->is_active==1)
            $color->is_active=0;
        else
            $color->is_active=1;

        $color->save();
    }
}
