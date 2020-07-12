<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Product;
use App\Store;
use App\Store_transfer_product;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\StoreProductInsert;
use App\Http\Requests\Dashboard\StoreProductUpdate;
class Store_productController extends Controller
{
    public function index(){
        $transfers=Store::all();
        $products=Product::all();
        $stroe_products=Store_transfer_product::all();
        return view('dashboard.stores.storesTransfereProducts',compact('transfers','products','stroe_products'));
    }

    public function insert(StoreProductInsert $request){
        $x=new Store_transfer_product;
        $x->store_id=$request->transfer_id;
        $x->product_id=$request->product_id;
        $x->amount=$request->amount;
        $x->save();

        return redirect('/dashboard/store_products');
    }

    function update(StoreProductUpdate $request){
        $x=Store_transfer_product::find($request->id);
        $x->store_id=$request->transfer_id;
        $x->product_id=$request->product_id;
        $x->amount=$request->amount;
        $x->save();

        return redirect('/dashboard/store_products');
    }

    public function del($id){
        Store_transfer_product::find($id)->delete();
        return redirect()->back();
    }
}
