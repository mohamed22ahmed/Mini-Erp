<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use DataTables;
use Validator;

class CityController extends Controller
{
    function index(){
        return view('dashboard.basics.cities');
    }

    function getdata(){
        $cities = City::all();
        if(request()->ajax()){
            return Datatables::of($cities)
            ->addColumn('action', function($city){
                return '<a href="#" class="btn btn-xl btn-primary edit" id="'.$city->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xl btn-'.($city->is_active ?"success":"danger").' active" id="'.$city->id.'"><i class="glyphicon glyphicon-active"></i> '.($city->is_active ?"Active":"Inactive").'</a>';
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
                $testName=City::where('name',$request->name)->first();
                if(!$testName){
                    $city=new City;
                    $city->name=$request->name;
                    if($request->notes)
                        $city->notes=$request->notes;

                    $city->save();
                    $success_output = '<div class="alert alert-success">Data Inserted</div>';
                }
                else
                    array_push($error_array,'Data Exist');
            }

            if($request->get('button_action') == 'update')
            {
                $city = City::find($request->get('student_id'));
                $isChanged = false;
                if($city->name!=$request->name){
                    $testName=City::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if(!$isChanged)
                {
                    $city->name = $request->name;
                    if($request->notes)
                        $city->notes = $request->notes;
                    $city->save();
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
        $city = City::find($id);
        // dd($id);
        $output = array(
            'name'     =>  $city->name,
            'notes'     =>  $city->notes
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $city = City::find($request->id);
        if($city->delete())
        {
            echo 'Data Deleted';
        }
    }

    function active(Request $request){
        $city = City::find($request->input('id'));
        if($city->is_active==1)
            $city->is_active=0;
        else
            $city->is_active=1;

        $city->save();
    }
}
