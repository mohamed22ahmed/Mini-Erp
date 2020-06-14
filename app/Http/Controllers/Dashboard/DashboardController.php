<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
class DashboardController extends Controller
{

    public function login(){
        if(!session('id'))
            return view('dashboard.login');
        return redirect('dashboard/');
    }

    public function loggedin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'pass'=>'required'
        ]);

        $q=Admin::where(['email'=>$request->email,'password'=>$request->pass])->first();
        if($q){
            session()->put('id',$q->id);
            session()->put('username',$q->username);
            return redirect('dashboard/');
        }
        return redirect()->back();
    }

    public function index(){
        if(session('id'))
            return view('dashboard.welcome');
        return redirect('dashboard/login');
    }

    public function logout(){

        session()->forget('id');
        session()->forget('username');
        return redirect('dashboard/login');
    }
}
