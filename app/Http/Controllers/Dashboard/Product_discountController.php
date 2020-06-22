<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product_discountController extends Controller
{
    public function index(){
        return view('dashboard.products.products_discounts');
    }
}
