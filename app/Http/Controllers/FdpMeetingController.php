<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\FdpMeeting;
use Auth;

class FdpMeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $meetings = DB::table("fdp_meetings")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.fdpMeeting.viewMeeting")->with("meetings", $meetings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.fdpMeeting.addMeeting");
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
            'date' => ['required', 'date'],
            'place' => ['required', 'string'],  
            'organiser' => ['required', 'string'],  
            'duration' => ['required', 'string'],  
            'type' => ['required', 'string'],  
            'dept' => ['required', 'string'],  
        ]);  

        FdpMeeting::create([
            'name' => $data['name'], 
            'level' => $data['level'], 
            'duration' => $data['duration'], 
            'date' => $data['date'],
            'organisers' => $data['organiser'], 
            'place' => $data['place'],
            'typeOfMeeting' => $data['type'],
            'department' => $data['dept'],
            'userId' => Auth::user()->id
        ]); 
        return Redirect::route('fdpMeeting.index')->with('message', 'Fdp Meeting Added Succesfully');
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
        return view("staff.fdpMeeting.editMeeting")->with("meeting", $meeting);
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
            'date' => ['required', 'date'],
            'place' => ['required', 'string'],  
            'organiser' => ['required', 'string'],  
            'duration' => ['required', 'string'],  
            'type' => ['required', 'string'],  
            'dept' => ['required', 'string'], 
        ]);  
        DB::table("fdp_meetings")
                ->where("id","=",$id)
                ->update([
            'name' => $data['name'], 
            'level' => $data['level'], 
            'duration' => $data['duration'], 
            'date' => $data['date'], 
            'typeOfMeeting' => $data['type'], 
            'place' => $data['place'],
            'organisers' => $data['organiser'],
            'department' => $data['dept']]);

        return Redirect::route('fdpMeeting.index')->with('message', 'Meeting Updated Succesfully');   
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
        return Redirect::route('fdpMeeting.index')->with('message', 'FDP Meeting Deleted Succesfully');
    }
}
