<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Discount;
use DataTables;
use Validator;

class DiscountController extends Controller
{
    function index(){
        return view('dashboard.basics.discounts');
    }

    function getdata(){
        $discounts = Discount::all();
        if(request()->ajax()){
            return Datatables::of($discounts)
            ->addColumn('action', function($discount){
                return '<a href="#" class="btn btn-xl btn-primary edit" id="'.$discount->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xl btn-danger delete" id="'.$discount->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    <a href="#" class="btn btn-xl btn-'.($discount->is_active ?"success":"danger").' active" id="'.$discount->id.'"><i class="glyphicon glyphicon-active"></i> '.($discount->is_active ?"Active":"Inactive").'</a>';
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
                $testName=Discount::where('name',$request->name)->first();
                if(!$testName){
                    $discount=new Discount;
                    $discount->name=$request->name;
                    if($request->notes)
                        $discount->notes=$request->notes;

                    $discount->save();
                    $success_output = '<div class="alert alert-success">Data Inserted</div>';
                }
                else
                    array_push($error_array,'Data Exist');
            }

            if($request->get('button_action') == 'update')
            {
                $discount = Discount::find($request->get('student_id'));
                $isChanged = false;
                if($discount->name!=$request->name){
                    $testName=Discount::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if(!$isChanged)
                {
                    $discount->name = $request->name;
                    if($request->notes)
                        $discount->notes = $request->notes;
                    $discount->save();
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
        $discount = Discount::find($id);
        // dd($id);
        $output = array(
            'name'     =>  $discount->name,
            'notes'     =>  $discount->notes
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $discount = Discount::find($request->input('id'));
        if($discount->delete())
        {
            echo 'Data Deleted';
        }
    }

    function active(Request $request){
        $discount = Discount::find($request->input('id'));
        if($discount->is_active==1)
            $discount->is_active=0;
        else
            $discount->is_active=1;

        $discount->save();
    }
}
