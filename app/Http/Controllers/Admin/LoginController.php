<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.admin_login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {  
        $email_check = $request->email;
        $password_check = $request->password;
        $user=User::whereEmail($email_check)->get();
        if(blank($user)){
            return redirect()->back()->with('error', 'email not matching!');
        }
        else{
            $check_admin = $user[0]->is_admin; 
            if($check_admin == 1){
                 $check_status = $user[0]->status;
                  if($check_status == 1){
                     if(Auth::attempt(['email' => $email_check, 'password' => $password_check ])){
                       return redirect('admin/home');
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
                return redirect()->back()->with('error', 'you are not registared admin!'); 
            }
            
        }
        
      
    }
       
    
    // admin logout
    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
