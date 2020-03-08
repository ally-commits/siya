<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Papers;
use Auth;

class PapersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $papers = DB::table("papers")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.papersPresented.viewPapers")->with("papers", $papers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.papersPresented.addPapers");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string'],
            'theme' => ['required', 'string'],
            'venue' => ['required', 'string'],
            'title' => ['required', 'string'],  
            'prize' => ['required', 'string'],  
            'nature' => ['required', 'string'],    
        ]);   
        Papers::create([
            'name' => $data['name'], 
            'theme' => $data['theme'], 
            'venue' => $data['venue'], 
            'title' => $data['title'],
            'prizes' => $data['prize'], 
            'nature' => $data['nature'], 
            'userId' => Auth::user()->id
        ]); 
        return Redirect::action('PapersController@index')->with('message', 'Papers Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paper  = Papers::find($id);
        return view("staff.papersPresented.editPapers")->with("paper", $paper);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $data = $request->all();
 
        $request->validate([
            'name' => ['required', 'string'],
            'theme' => ['required', 'string'],
            'venue' => ['required', 'string'],
            'title' => ['required', 'string'],  
            'prize' => ['required', 'string'],  
            'nature' => ['required', 'string'],    
        ]);  
        DB::table("papers")
                ->where("id","=",$id)
                ->update([
            'name' => $data['name'], 
            'theme' => $data['theme'], 
            'venue' => $data['venue'], 
            'title' => $data['title'], 
            'prizes' => $data['prize'], 
            'nature' => $data['nature']]);

        return Redirect::action('PapersController@index')->with('message', 'Paper Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $meeting  = Papers::find($id);
        $meeting->delete();
        return Redirect::action('PapersController@index')->with('message', 'Paper Deleted Succesfully');
    }
}
