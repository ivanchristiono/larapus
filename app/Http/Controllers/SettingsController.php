<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class SettingsController extends Controller
{
    public function construct_(){
        $this->middleware('auth');
    }

    public function profile(){
        
        return view('settings.profile');
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Profil berhasil diubah"
        ]);

        return redirect('settings/profile');
    }

    public function editPassword(){
        return view('settings.edit-password');
    }

    public function updatePassword(Request $request){

        $user = Auth::user();
        $this->validate($request, [
            'password' => 'required|passcheck:' . $user->password,
            'new_password' => 'required|confirmed|min:6',
        ],
            ['password.passcheck' => 'Password lama tidak sesuai'

        ]);

        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil mengubah password"
        ]);

        return redirect ('settings/password');
    }
}
