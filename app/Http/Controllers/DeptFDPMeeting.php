<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\FdpMeeting;
use Auth;

class DeptFDPMeeting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dept');
    }
    public function index()
    { 
        $meetings = DB::table("fdp_meetings")
                ->where("userId","=",Auth::user()->deptId)
                ->latest()
                ->get();
        return view("dept.fdpMeeting.viewMeeting")->with("meetings", $meetings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view("dept.fdpMeeting.addMeeting");
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
            'level' => ['required', 'string'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'desc' => ['required','string'],
            'place' => ['required', 'string'],  
            'organiser' => ['required', 'string'],   
            'type' => ['required', 'string'],  
            'dept' => ['required', 'string'],  
        ]);  

        FdpMeeting::create([
            'name' => $data['name'], 
            'level' => $data['level'], 
            'to' => $data['to'], 
            'from' => $data['from'],
            'desc' => $data['desc'],
            'organisers' => $data['organiser'], 
            'place' => $data['place'],
            'typeOfMeeting' => $data['type'],
            'department' => $data['dept'],
            'userId' => Auth::user()->deptId
        ]); 
        return Redirect::action('DeptFDPMeeting@index')->with('message', 'Fdp Meeting Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meeting  = FdpMeeting::find($id);
        return view("dept.fdpMeeting.editMeeting")->with("meeting", $meeting);
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
            'level' => ['required', 'string'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'place' => ['required', 'string'],  
            'organiser' => ['required', 'string'],  
            'desc' => ['required', 'string'],  
            'type' => ['required', 'string'],  
            'dept' => ['required', 'string'], 
        ]);  
        DB::table("fdp_meetings")
                ->where("id","=",$id)
                ->update([
            'name' => $data['name'], 
            'level' => $data['level'], 
            'desc' => $data['desc'], 
            'from' => $data['from'], 
            'to' => $data['to'], 
            'desc' => $data['desc'], 
            'typeOfMeeting' => $data['type'], 
            'place' => $data['place'],
            'organisers' => $data['organiser'],
            'department' => $data['dept']]);

        return Redirect::action('DeptFDPMeeting@index')->with('message', 'Meeting Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $meeting  = FdpMeeting::find($id);
        $meeting->delete();
        return Redirect::action('DeptFDPMeeting@index')->with('message', 'FDP Meeting Deleted Succesfully');
    }
}
