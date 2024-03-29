<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Product;
use App\Product_unit;
use App\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ProductUnitInsert;
use App\Http\Requests\Dashboard\ProductUnitUpdate;
class Product_unitController extends Controller
{
    public function index(){
        $products=Product::all();
        $units=Unit::all();
        $product_units=Product_unit::all();
        return view('dashboard.products.products_units',compact('product_units','products','units'));
    }

    public function insert(ProductUnitInsert $request){
        $x=new Product_unit;
        $x->product_id=$request->product_id;
        $x->unit_id=$request->unit_id;
        $x->price=$request->price;
        $x->save();

        return redirect('/dashboard/product_unit');
    }

    function update(ProductUnitUpdate $request){
        $x=Product_unit::find($request->id);
        $x->product_id=$request->product_id;
        $x->unit_id=$request->unit_id;
        $x->price=$request->price;
        $x->save();

        return redirect('/dashboard/product_unit');
    }

    public function del($id){
        Product_unit::find($id)->delete();
        return redirect()->back();
    }
}
