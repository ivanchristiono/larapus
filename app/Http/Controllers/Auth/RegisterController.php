<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\Builder;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('user-should-verified');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            
        ]);
        $memberRole = Role::where('name', 'member')->first();
        $user->attachRole($memberRole);
        $user->sendVerification();
        return $user;
    }

    public function verify(Request $request, $token) {

        $email = $request->get('email');
        $user = User::where('verification_token', $token)->where('email', $email)->first();
        if ($user){
            $user->verify();

            Session::flash("flash_notification",[
                "level" => "success",
                "message" => "Akun anda Sudah aktif. Silahkan login"
            ]);

        Auth::login($user); 
     }
     return redirect('/');
}

    public function sendVerification(Request $request){
        $user = User::where('email',$request->get('email'))->first();
        if ($user && !$user->is_verified){
            $user->sendVerification();

            Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Link aktivasi telah dikirim ulang"
            ]);
        }
        return redirect('/login');
    }

}
