<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use App\Category;

class ProductController extends Controller
{
    public function index(){

        return view('dashboard.products.products');
    }

    public function create() {
        $stores = Store::get(['id', 'name']);
        $categories = Category::get(['id', 'name']);
        return view('dashboard.products.add_product' , compact('stores' , 'categories'));
    }

    public function edit(){
        return view('dashboard.products.add_product');
    }
}
