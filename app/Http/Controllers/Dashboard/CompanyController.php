<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use validator;
use App\Company;
use App\Http\Requests\Dashboard\CompanyUpdate;
class CompanyController extends Controller
{
    public function index(){
        $data=Company::first();
        return view('dashboard.administrator.company_info',compact('data'));
    }

    public function update(CompanyUpdate $request){
        $company=Company::first();
        $company->name=$request->name;
        $company->phone=$request->phone;
        $company->email=$request->email;
        $company->tax_id=$request->tax_id;
        $company->trad_id=$request->trad_id;

        if($request->hasFile('logo')){
            $fileWithExt=$request->file('logo')->getClientOriginalName();
            $fileWithoutExt=pathinfo($fileWithExt,PATHINFO_FILENAME);
            $fileExt=$request->file('logo')->getClientOriginalExtension();
            $fileNewName=$fileWithoutExt.'_'.time().'.'.$fileExt;
            $path=$request->file('logo')->storeAs('public/imgs/',$fileNewName);
            Storage::delete('public/imgs/'.$company->logo);
            $company->logo=$fileNewName;
        }

        $company->save();
        return redirect('/dashboard/companies');
    }
}
