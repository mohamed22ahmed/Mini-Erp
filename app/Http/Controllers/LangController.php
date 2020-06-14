<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LangController extends Controller
{
    public function index($lang){
        app()->setLocale($lang);
        session()->put('lang',$lang);
        $ref = $_SERVER["HTTP_REFERER"];
        // return redirect('/dashboard?ref=' . $ref);
        return redirect($ref);
    }
}
