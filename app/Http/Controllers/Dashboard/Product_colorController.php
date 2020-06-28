<?php

namespace App\Http\Controllers\Dashboard;

use App\Color;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_color;
use Illuminate\Http\Request;

class Product_colorController extends Controller
{
    public function index(){
        $products=Product::all();
        $colors=Color::all();
        $product_colors=Product_color::all();
        return view('dashboard.products.products_colors',compact('product_colors','products','colors'));
    }
    public function insert(Request $request){
        $request->validate([
            'product_id'=>'required',
            'color_id'=>'required',
        ]);

        $x=new Product_color;
        $x->product_id=$request->product_id;
        $x->color_id=$request->color_id;
        $x->save();

        return redirect('/dashboard/product_color');
    }

    public function edit($id){
        $record=Product_color::find($id);
        return redirect('/dashboard/recharge_company',compact('record'));
    }

    function update(Request $request,$id){
        $request->validate([
            'branch_id'=>'required',
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email'
        ]);

        $x=Product_color::find($id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->save();

        return redirect('/dashboard/recharge_company');
    }

    public function del($id){
        Product_color::find($id)->delete();
        return redirect()->back();
    }
}
