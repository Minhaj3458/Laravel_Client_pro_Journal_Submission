<?php

namespace App\Http\Controllers\Reviewer\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Journal_Type;
use App\Models\Admin\Journal;
class JournalController extends Controller
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
       $journal = Journal::latest()->get();
       return view('reviewer.journal.manage_journal',compact('journal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $journal_type = Journal_Type::latest()->get();
        return view('reviewer.journal.create_journal',compact('journal_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $journal = new Journal; 
       $journal->user_id = Auth::id();
       $journal->journal_type_id = $request->journal_type_id;
       $journal->name = $request->name;
       $journal->email = $request->email;
       $journal->phone_number = $request->phone_number;
       $journal->topic_name = $request->topic_name;
       $journal->student_id = $request->student_id;
       $journal->department = $request->department;
       $journal->batch = $request->batch;
       $journal->submit_by = 'reviewer';
       $journal->description = $request->description;
       if($request->hasfile('pdf'))
        {
            $file = $request->file('pdf');
            $extention = $file->getClientOriginalExtension();
            $pdf_name = time().'.'.$extention;
            $destinationPath = $file->move(public_path('assets/paper_pdf/'),$pdf_name);
            $journal->pdf = $pdf_name;
        }
       $save = $journal->save();
        if($save){
          return redirect()->back()->with('message','create journal successfully!');
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
        $pdf = Journal::find($id);
        return view('reviewer.journal.show_pdf',compact('pdf'));
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
