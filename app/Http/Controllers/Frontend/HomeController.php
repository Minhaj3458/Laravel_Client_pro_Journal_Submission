<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Journal_Type;
use App\Models\Admin\Journal;

class HomeController extends Controller
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
       $journal_type = Journal_Type::latest()->get();
       $journal_latest = Journal::where('status','1')->latest()->limit(20)->get();
       $journal = Journal::where('status','1')->inRandomOrder()->paginate(10); 
       return view('frontend.page.home',compact('journal_type','journal','journal_latest'));
    }


    public function journal_search(Request $request)
    {
       $journal = Journal::where('topic_name','like','%'.$request->name.'%')->inRandomOrder()->paginate(10); 
       $journal_type = Journal_Type::latest()->get();
       $journal_latest = Journal::where('status','1')->latest()->limit(20)->get();
       if($journal->count() >= '1'){
         return view('frontend.page.home',compact('journal','journal_latest','journal_type'));
       }
       else{
         return view('frontend.page.home',compact('journal','journal_latest','journal_type'))->with('message_warring','Nothing Found');
       }
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
