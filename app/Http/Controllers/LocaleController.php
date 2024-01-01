<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function index($lang){
        App::setLocale($lang);
        session()->put('locale', $lang);

        // return redirect()->route('dashboard.index');
        return redirect()->back();
    }
    // public function dashboard(){
    //     return view('dashboard.index');
    // }
}
