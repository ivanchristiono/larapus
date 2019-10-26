<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showAbout(){
        return view ('about');
    }
}
