<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Recharge_companyController extends Controller
{
    public function index(){
        return view('dashboard.Recharge.recharge_companies');
    }
}
