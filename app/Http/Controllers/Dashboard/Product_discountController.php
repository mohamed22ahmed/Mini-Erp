<?php

namespace App\Http\Controllers\Dashboard;

use App\Discount;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_discount;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ProductDicountInsert;
class Product_discountController extends Controller
{
    public function index(){
        $products=Product::all();
        $discounts=Discount::all();
        $product_discounts=Product_discount::all();
        return view('dashboard.products.products_discounts',compact('product_discounts','products','discounts'));
    }
    public function insert(Request $request){

        $x=new Product_discount;
        $x->product_id=$request->product_id;
        $x->discount_id=$request->discount_id;
        $x->save();

        return redirect('/dashboard/product_discount');
    }

    function update(Request $request){
        $request->validate([
            'product_id'=>'required',
            'discount_id'=>'required',
        ]);

        $x=Product_discount::find($request->id);
        $x->product_id=$request->product_id;
        $x->discount_id=$request->discount_id;
        $x->save();

        return redirect('/dashboard/product_discount');
    }

    public function del($id){
        Product_discount::find($id)->delete();
        return redirect()->back();
    }
}
