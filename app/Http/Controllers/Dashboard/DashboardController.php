<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Admin;
use App\Http\Requests\Dashboard\LoginRequest;
class DashboardController extends Controller
{

    public function login(){
        if(!session('id'))
            return view('dashboard.login.login');
        return redirect('dashboard/');
    }

    public function loggedin(LoginRequest $request){
        $pass = bcrypt($request->password);

        $q = Admin::where(['email'=>$request->email,'password'=>$pass])->first();
        if($q){
            session()->put('id',$q->id);
            session()->put('username',$q->username);
            return redirect('dashboard/');
        }
        return redirect()->back();
    }

    public function forget(){
        return view('dashboard.login.forget');
    }

    public function forget_send(Request $request){
        $request->validate([
            'email'=>'required|email'
        ]);
        session()->put('forget_email',$request->email);
        $code=sprintf("%06d", mt_rand(1, 999999));
        session()->put('code',$code);
        $data=['name'=>'Mohamed','email'=>'memo@gmail.com','code'=>$code];
        Mail::to('mohammedahmedhammam113@gmail.com')->send(new ContactFormMail($data));
        return redirect('/dashboard/code');
    }

    public function code(){
        if(session('forget_email'))
            return view('dashboard.login.enter_code');
        return redirect('/dashboard/login');

    }

    public function code_check(Request $request){
        $request->validate([
            'code'=>'required|numeric'
        ]);
        if($request->code==session('code'))
            return redirect('/dashboard/reset_pass');
        return redirect('/dashboard/login');
    }

    public function reset_page(){
        if(session('forget_email'))
            return view('dashboard.login.reset');
        return redirect('/dashboard/login');
    }

    public function reset(Request $request){
        $request->validate([
            'password'=>'required|confirmed'
        ]);
        if(session('forget_email')){
            $admin=Admin::where('email',session('forget_email'))->first();
            $pass=bcrypt($request->password);
            $admin->password=$pass;
            $admin->save();
        }
        return redirect('/dashboard/login');
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
