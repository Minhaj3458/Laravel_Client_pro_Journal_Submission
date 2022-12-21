<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Journal_Type;

class Journal_TypeController extends Controller
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
        $journal_type = Journal_Type::latest()->get();
        return view('admin.page.journal_type.manage_journal_type',compact('journal_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.journal_type.create_journal_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $journal_type = new Journal_Type;
        $journal_type->journal_type = $request->journal_type;
        $save = $journal_type->save();
        if($save){
          return redirect()->back()->with('message','create journal type successfully!');
        }
        else{
         return redirect()->back()->with('message_warring','something is wrong!');
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
       $journal_type = Journal_Type::find($id);
       return view('admin.page.journal_type.update_journal_type',compact('journal_type'));
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
        $journal_type = Journal_Type::find($id);
        $journal_type->journal_type = $request->journal_type;
        $save = $journal_type->save();
        if($save){
          return redirect('admin/manage_journal_type')->with('message','update journal type successfully!');
        }
        else{
         return redirect('admin/manage_journal_type')->with('message_warring','something is wrong!');
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
        $journal_type = Journal_Type::find($id);
        $delete = $journal_type->delete();
        if($delete){
          return redirect()->back()->with
          ('message','Journal Type '.' '.$journal_type->journal_type.' '.'delete successfully!');
        }
        else{
         return redirect()->back()->with('message_warring','something is wrong!');
        }
    }
}
