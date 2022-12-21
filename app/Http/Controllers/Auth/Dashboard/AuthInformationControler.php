<?php

namespace App\Http\Controllers\Auth\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Auth\AuthInformation;
class AuthInformationControler extends Controller
{

    public function __construct()
     {
        $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_profile = User::find(Auth::id());
        return view('auth.page.auth_information.manage_profile',compact('auth_profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $user_profile = User::find(Auth::id());
       return view('auth.page.auth_information.create_information',compact('user_profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user_id_check = $request->user_id;
      $users = AuthInformation::where('user_id',$user_id_check)->exists(); 
      if($users){
       return redirect()->back()->with('user_warring','this username informatiom already created!');
      }
      else{
        $auth_info = new AuthInformation;
        $auth_info->user_id = $user_id_check;
        $auth_info->name = $request->name;
        $auth_info->address = $request->address;
        $auth_info->number = $request->number;
        $auth_info->about = $request->about;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $destinationPath = $file->move(public_path('assets/auth_profile/'),$image_name);
            $auth_info->image= $image_name;
        }
        $save = $auth_info->save();
        if($save){
          return redirect()->back()->with('message','create  information successfully!');
        }
       else{
         return redirect()->back()->with('message_warring','something is wrong!');
        }
      }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $user_profile = User::find(Auth::id());
        return view('auth.page.auth_information.show_profile',compact('user_profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $auth_profile = AuthInformation::find($id);
       return view('auth.page.auth_information.update_profile',compact('auth_profile'));
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
        $auth_info = AuthInformation::find($id);
        $auth_info->user_id = $request->user_id;
        $auth_info->name = $request->name;
        $auth_info->address = $request->address;
        $auth_info->number = $request->number;
        $auth_info->about = $request->about;
        if($request->hasfile('image'))
        {
            if($auth_info->image){
              $image_delete = AuthInformation::where("image",$auth_info->image);
              if($image_delete){
                unlink("assets/auth_profile/".$auth_info->image);
               }
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $destinationPath = $file->move(public_path('assets/auth_profile/'),$image_name);
            $auth_info->image= $image_name;
        }
        $save = $auth_info->save();
        if($save){
          return redirect('auth/manage_profile')->with('message','Update information successfully!');
        }
       else{
         return redirect('auth/manage_profile')->with('message_warring','something is wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $auth_info = AuthInformation::find($id);
       if($auth_info->image){
            unlink("assets/auth_profile/".$auth_info->image);
        }
        $delete = $auth_info->delete();
        if($delete){
          return redirect('auth/manage_profile')->with
          ('message','user name'.' '.$auth_info->user->user_name.' '.'information delete successfully!');
        }
        else{
         return redirect()->back()->with('message_warring','something is wrong!');
        }
    }
}
