<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
        return view('dashboard.mandoop_delivery.delivery');
    }
}
