<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Exp_revController extends Controller
{
    public function index(){
        return view('dashboard.expenses.incomes_out_operations');
    }
}
