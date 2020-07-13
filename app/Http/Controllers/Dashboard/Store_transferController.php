<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Store;
use App\Store_transfer;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\StoreTransferInsert;
use App\Http\Requests\Dashboard\StoreTransferUpdate;
class Store_transferController extends Controller
{
    public function index(){
        $admins=Admin::all();
        $stores=Store::all();
        $transfers=Store_transfer::all();
        return view('dashboard.stores.stores_transfers',compact('admins','stores','transfers'));
    }

    public function insert(StoreTransferInsert $request){
        $x=new Store_transfer;
        $x->admin_id=$request->admin_id;
        $x->from_store=$request->from_store;
        $x->to_store=$request->to_store;
        $x->transfer_date=$request->transfer_date;
        $x->product_count=$request->product_count;
        $x->save();

        return redirect('/dashboard/store_transfer');
    }

    function update(StoreTransferUpdate $request){
        $x=Store_transfer::find($request->id);
        $x->admin_id=$request->admin_id;
        $x->from_store=$request->from_store;
        $x->to_store=$request->to_store;
        $x->transfer_date=$request->transfer_date;
        $x->product_count=$request->product_count;
        $x->save();

        return redirect('/dashboard/store_transfer');
    }

    public function del($id){
        Store_transfer::find($id)->delete();
        return redirect()->back();
    }
}
