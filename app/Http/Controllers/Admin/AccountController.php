<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin\AdminInformation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = User::latest()->get();
        return view('admin.account.users_manage',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.account.create_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $password = $request->password;
        $con_password = $request->con_password;
        if ($password == $con_password){
            $user = new User;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->is_admin = 1;
            $save = $user->save();
            return redirect()->back()->with('message','create admin successfully!');
        }
        else{
           return redirect()->back()->with('pass_error', 'password and confirm password not matching!');
        }
       
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
        $user = User::find($id);
        $user_name = $user->user_name;
        $user_id =  $user->id;
        $admin_info = AdminInformation::where('user_id',$user_id);
        $admin_delete = $admin_info->delete();
        $delete = $user->delete();
        if($delete){
          return redirect('admin/user_manage')->with
          ('message','user name'.' '. $user_name.' '.' delete successfully!');
        }
        else{
         return redirect()->back()->with('message_warring','something is wrong!');
        }
    }

    //user Status Active
    public function user_status_update(Request $request, $id)
    {
        $check = User::find($id);
        $user_name = $check->user_name;
        if( $check->status == '0')
        {
          $user = User::where('id', $id)->update(['status' => '1']);
          if($user){
          return redirect('admin/user_manage')->with
          ('message','user name'.' '.$user_name.' '.'Active successfully');
          }
          else{
           return redirect()->back()->with('message_warring','something is wrong!');
          }
          
        }
        else{
          $user = User::where('id', $id)->update(['status' => '0']);
          if($user){
           return redirect('admin/user_manage')->with
           ('message','user name'.' '.$user_name.' '.'Inactive successfully');
          }
          else{
           return redirect()->back()->with('message_warring','something is wrong!');
          }
        }
    }
}
