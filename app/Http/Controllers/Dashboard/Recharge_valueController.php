<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Recharge_valueController extends Controller
{
    public function index(){
        return view('dashboard.Recharge.recharge_values');
    }
}
