<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class SettingsController extends Controller
{
    public function construct_(){
        $this->middleware('auth');
    }

    public function profile(){
        
        return view('settings.profile');
    }
}
