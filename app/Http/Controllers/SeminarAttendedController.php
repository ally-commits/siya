<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\SeminarAttended;
use Auth;

class SeminarAttendedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $seminar = DB::table("seminar_attendeds")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.seminarAttended.viewSeminars")->with("seminar", $seminar);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.seminarAttended.addSeminar");
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
            'place' => ['required', 'string'],    
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'dept' => ['required', 'string'],
            'type' => ['required', 'string'],
            'title' => ['required', 'string'],    
            'prize' => ['required', 'string'],    
        ]);   
        SeminarAttended::create([
            'name' => $data['name'], 
            'title' => $data['title'], 
            'prize' => $data['prize'], 
            'dept' => $data['dept'], 
            'type' => $data['type'], 
            'place' => $data['place'], 
            'date' => $data['date'],
            'level' => $data['level'], 
            'userId' => Auth::user()->id
        ]); 
        return Redirect::action('SeminarAttendedController@index')->with('message', 'Seminar Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seminar  = SeminarAttended::find($id);
        return view("staff.seminarAttended.editSeminar")->with("seminar", $seminar);
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
            'place' => ['required', 'string'],    
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'dept' => ['required', 'string'],
            'type' => ['required', 'string'],
            'title' => ['required', 'string'],    
            'prize' => ['required', 'string'],    
        ]); 
        DB::table("seminar_attendeds")
                ->where("id","=",$id)
                ->update([
            'name' => $data['name'], 
            'title' => $data['title'], 
            'dept' => $data['dept'], 
            'type' => $data['type'], 
            'prize' => $data['prize'], 
            'place' => $data['place'], 
            'date' => $data['date'],
            'level' => $data['level'], ]);

        return Redirect::action('SeminarAttendedController@index')->with('message', 'SeminarAttended Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $achive  = SeminarAttended::find($id);
        $achive->delete();
        return Redirect::action('SeminarAttendedController@index')->with('message', 'Seminar Deleted Succesfully');
    }
}
