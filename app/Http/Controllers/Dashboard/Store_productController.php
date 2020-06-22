<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Store_productController extends Controller
{
    public function index(){
        return view('dashboard.stores.storesTransfereProducts');
    }
}
