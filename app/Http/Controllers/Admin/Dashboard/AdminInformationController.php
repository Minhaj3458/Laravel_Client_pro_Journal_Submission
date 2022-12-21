<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Journal;
use App\Models\Admin\AdminInformation;

class AdminInformationController extends Controller
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
    public function admin_profile()
    {   
       $user_profile = User::find(Auth::id());
       return view('admin.page.admininformation.admin_profile_show',compact('user_profile'));
    }
    public function index()
    {   
        $admin_info = AdminInformation::latest()->get();
        return view('admin.page.admininformation.manage_information',compact('admin_info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $users = User::where('is_admin','1')->latest()->get();
        return view('admin.page.admininformation.create_infromation',compact('users'));
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
      $users = AdminInformation::where('user_id',$user_id_check)->exists(); 
      if($users){
       return redirect()->back()->with('user_warring','this username informatiom already created!');
      }
      else{
        $admin_info = new AdminInformation;
        $admin_info->user_id = $user_id_check;
        $admin_info->name = $request->name;
        $admin_info->address = $request->address;
        $admin_info->number = $request->number;
        $admin_info->about = $request->about;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $destinationPath = $file->move(public_path('assets/profile/'),$image_name);
            $admin_info->image= $image_name;
        }
        $save = $admin_info->save();
        if($save){
          return redirect()->back()->with('message','create admin information successfully!');
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
       $admin_info = AdminInformation::find($id);
       $users = User::where('is_admin','1')->latest()->get();
       return view('admin.page.admininformation.update_admininformation',compact('admin_info','users'));
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
       $admin_info = AdminInformation::find($id);
       $admin_info->name = $request->name;
       $admin_info->address = $request->address;
       $admin_info->number = $request->number;
       $admin_info->about = $request->about;
       if($request->hasfile('image'))
        {
           if($admin_info->image){
              $image_delete = AdminInformation::where("image",$admin_info->image);
              if($image_delete){
                unlink("assets/profile/".$admin_info->image);
               }
            }
          $file = $request->file('image');
          $extention = $file->getClientOriginalExtension();
          $image_name = time().'.'.$extention;
          $destinationPath = $file->move(public_path('assets/profile/'),$image_name);
          $admin_info->image= $image_name;
        }
       
        $save = $admin_info->save();
        if($save){
          return redirect('admin/manage_information')->with
          ('message','Update User name'.' '.$admin_info->user->user_name.' '.'information successfully!');
        }
        else{
         return redirect()->back()->with('message_warring','something is wrong!');
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
        $admin_info = AdminInformation::find($id);
        if($admin_info->image){
            unlink("assets/profile/".$admin_info->image);
        }
        $delete = $admin_info->delete();
        if($delete){
          return redirect('admin/manage_information')->with
          ('message','user name'.' '.$admin_info->user->user_name.' '.'information delete successfully!');
        }
        else{
         return redirect()->back()->with('message_warring','something is wrong!');
        }
    }
}
