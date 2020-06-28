<?php

namespace App\Http\Controllers\Dashboard;

use App\Discount;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_discount;
use Illuminate\Http\Request;

class Product_discountController extends Controller
{
    public function index(){
        $products=Product::all();
        $discounts=Discount::all();
        $product_discounts=Product_discount::all();
        return view('dashboard.products.products_discounts',compact('product_discounts','products','discounts'));
    }
    public function insert(Request $request){
        $request->validate([
            'product_id'=>'required',
            'discount_id'=>'required',
        ]);

        $x=new Product_discount;
        $x->product_id=$request->product_id;
        $x->discount_id=$request->discount_id;
        $x->save();

        return redirect('/dashboard/product_discount');
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
        Product_discount::find($id)->delete();
        return redirect()->back();
    }
}
