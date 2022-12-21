<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $email_check = $request->email;
        $password_check = $request->password;
        $user=User::whereEmail($email_check)->get();
        if(blank($user)){
            return redirect()->back()->with('error', 'email not matching!');
        }
        else{
            $check_auth = $user[0]->is_auth; 
            if($check_auth == 1){
                 $check_status = $user[0]->status;
                  if($check_status == 1){
                     if(Auth::attempt(['email' => $email_check, 'password' => $password_check ])){
                       return redirect('auth/show_profile');
                     }
                     else{
                         return redirect()->back()->with('error', 'password not matching!');
                     }
                  }
                  else{
                     return redirect()->back()->with('error', 'please contact your administrator!'); 
                  }
            }
            else{
                return redirect()->back()->with('error', 'you are not registared auth!'); 
            }
            
        }
    }

     // reviewer logout
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
   
    // password Success
    public function pass_success()
    {
        return view('auth.password_success_msg');
    }
}
