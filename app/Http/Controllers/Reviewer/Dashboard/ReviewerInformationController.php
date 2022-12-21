<?php

namespace App\Http\Controllers\Reviewer\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reviewer\ReviewerInformation;
class ReviewerInformationController extends Controller
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
        $review_profile = User::find(Auth::id());
        return view('reviewer.reviewerinformation.manage_profile',compact('review_profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_profile = User::find(Auth::id());
        return view('reviewer.reviewerinformation.create_profile',compact('user_profile'));
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
      $users = ReviewerInformation::where('user_id',$user_id_check)->exists(); 
      if($users){
       return redirect()->back()->with('user_warring','this username informatiom already created!');
      }
      else{
        $reviewer_info = new ReviewerInformation;
        $reviewer_info->user_id = $user_id_check;
        $reviewer_info->name = $request->name;
        $reviewer_info->address = $request->address;
        $reviewer_info->number = $request->number;
        $reviewer_info->about = $request->about;
        $reviewer_info->student_id = $request->student_id;
        $reviewer_info->department = $request->department;
        $reviewer_info->Batch = $request->Batch;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $image_name = time().'.'.$extention;
            $destinationPath = $file->move(public_path('assets/reviewer_profile/'),$image_name);
            $reviewer_info->image= $image_name;
        }
        $save = $reviewer_info->save();
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
       return view('reviewer.reviewerinformation.reviewer_profile',compact('user_profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $reviewer_profile = ReviewerInformation::find($id);
       return view('reviewer.reviewerinformation.update_profile',compact('reviewer_profile'));
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
      $reviewer_info = ReviewerInformation::find($id);
      $reviewer_info->user_id =  $request->user_id;
      $reviewer_info->name = $request->name;
      $reviewer_info->address = $request->address;
      $reviewer_info->number = $request->number;
      $reviewer_info->about = $request->about;
      $reviewer_info->student_id = $request->student_id;
      $reviewer_info->department = $request->department;
      $reviewer_info->Batch = $request->Batch;
      if($request->hasfile('image'))
      { 
        if($reviewer_info->image){
              $image_delete = AdminInformation::where("image",$reviewer_info->image);
              if($image_delete){
                unlink("assets/reviewer_profile/".$reviewer_info->image);
               }
            }
        $file = $request->file('image');
        $extention = $file->getClientOriginalExtension();
        $image_name = time().'.'.$extention;
        $destinationPath = $file->move(public_path('assets/reviewer_profile/'),$image_name);
        $reviewer_info->image= $image_name;
        }
      $save = $reviewer_info->save();
      if($save){
          return redirect('reviewer/manage_profile')->with('message','Update  information successfully!');
        }
       else{
         return redirect('reviewer/manage_profile')->with('message_warring','something is wrong!');
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
        $reviewer_profile = ReviewerInformation::find($id);
        if($reviewer_profile->image){
            unlink("assets/reviewer_profile/".$reviewer_profile->image);
        }
        $delete = $reviewer_profile->delete();
        if($delete){
          return redirect('reviewer/manage_profile')->with
          ('message','user name'.' '.$reviewer_profile->user->user_name.' '.'information delete successfully!');
        }
        else{
         return redirect()->back()->with('message_warring','something is wrong!');
        }
    
    }
}
