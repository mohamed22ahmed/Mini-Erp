<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DataTables;
use Validator;


class CategoryController extends Controller
{
    function index(){
        return view('dashboard.basics.categories');
    }

    function getdata(){
        $categories = Category::all();
        if(request()->ajax()){
            return Datatables::of($categories)
            ->addColumn('action', function($category){
                return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$category->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-sm btn-danger delete" id="'.$category->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                    <a href="#" class="btn btn-sm btn-'.($category->is_active ?"success":"danger").' active" id="'.$category->id.'"><i class="glyphicon glyphicon-active"></i> '.($category->is_active ?"Active":"Inactive").'</a>';
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
        if ($validation->fails()){
            foreach ($validation->messages()->getMessages() as $field_name => $messages){
                $error_array[] = $messages;
            }
        }
        else{
            if($request->get('button_action') == 'insert'){
                $testName=Category::where('name',$request->name)->first();
                if(!$testName){
                    $category=new Category;
                    $category->name=$request->name;
                    if($request->notes)
                        $category->notes=$request->notes;

                    $category->save();
                    $success_output = '<div class="alert alert-success">Data Inserted</div>';
                }
                else
                    array_push($error_array,'Data Exist');
            }

            if($request->get('button_action') == 'update')
            {
                $category = Category::find($request->get('student_id'));
                $isChanged = false;
                if($category->name!=$request->name){
                    $testName=Category::where('name',$request->name)->first();
                    if($testName){
                        array_push($error_array,'Data Exist');
                        $isChanged = true;
                    }
                }
                if(!$isChanged)
                {
                    $category->name = $request->name;
                    if($request->notes)
                        $category->notes = $request->notes;
                    $category->save();
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
        $category = Category::find($id);
        // dd($id);
        $output = array(
            'name'     =>  $category->name,
            'parent_id'     =>  $category->parent_id,
            'notes'     =>  $category->notes
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $category = Category::find($request->input('id'));
        if($category->delete())
        {
            echo 'Data Deleted';
        }
    }

    function active(Request $request){
        $category = Category::find($request->id);
        if($category->is_active==1)
            $category->is_active=0;
        else
            $category->is_active=1;

        $category->save();
    }
}
