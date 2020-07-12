<?php

namespace App\Http\Controllers\Dashboard;

use App\Branch;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\ClientInsert;
class ClientController extends Controller
{
    public function index(){
        $branches=Branch::all();
        $clients=Client::all();
        return view('dashboard.clients_providers.client',compact('branches','clients'));
    }

    public function insert(ClientInsert $request){

        $x=new Client;
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->user_type=$request->client_type;
        if($request->client_type==2){
            $x->expected_user_date=$request->exp_date;
            $x->alert_after_hours=$request->alert_hours;
        }
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/client');
    }

    function update(Request $request){

        $x=Client::find($request->id);
        $x->branch_id=$request->branch_id;
        $x->name=$request->name;
        $x->address=$request->address;
        $x->phone=$request->phone;
        $x->email=$request->email;
        $x->user_type=$request->client_type;
        if($request->client_type==2){
            $x->expected_user_date=$request->exp_date;
            $x->alert_after_hours=$request->alert_hours;
        }
        if($request->notes)
            $x->notes=$request->notes;
        $x->save();

        return redirect('/dashboard/client');
    }

    public function del($id){
        Client::find($id)->delete();
        return redirect()->back();
    }

    public function active($id){
        $x=Client::find($id);
        // dd($x);
        if($x->is_active==1)
            $x->is_active=0;
        else
            $x->is_active=1;
        $x->save();
        return redirect()->back();
    }
}
