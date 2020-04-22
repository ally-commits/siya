<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\FdpMeeting;
use Auth;

class AdminFdpMeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type, $staffId)
    {
        if($type == "staff") {
            $value = "userId";
        } else if($type == "admin") {
            $value = "adminId";
        } else if($type == "department") {
            $value = "deptId";
        }
        $meetings = DB::table("fdp_meetings")
                ->where($value,"=",$staffId)
                ->latest()
                ->get();
        if($type == "admin") {
            $user = DB::table("admins")->where("id","=",$staffId)->limit(1)->get();
        } else if($type == "staff") {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        } else if($type == "department"){
            $user = DB::table("depts")->where("id","=",$staffId)->limit(1)->get();
        }
        return view("admin.staffActivity.fdpMeeting.viewMeeting")
            ->with("meetings", $meetings)
            ->with("user", $user)
            ->with("staffId", $staffId)
            ->with("type", $type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $staffId)
    {
        return view("admin.staffActivity.fdpMeeting.addMeeting")->with("staffId", $staffId)->with("type", $type);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$type,  $staffId)
    {
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string'],
            'level' => ['required', 'string'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'place' => ['required', 'string'], 
            'desc' => ['required', 'string'],  
            'organiser' => ['required', 'string'],  
            'type' => ['required', 'string'],  
            'dept' => ['required', 'string'],  
        ]);  
        if($type == "staff") {
            $value = "userId";
        } else if($type == "admin") {
            $value = "adminId";
        } else if($type == "department") {
            $value = "deptId";
        }
        FdpMeeting::create([
            'name' => $data['name'], 
            'level' => $data['level'], 
            'desc' => $data['desc'], 
            'from' => $data['from'],
            'to' => $data['to'],
            'organisers' => $data['organiser'], 
            'place' => $data['place'],
            'typeOfMeeting' => $data['type'],
            'department' => $data['dept'],
            $value => $staffId
        ]); 
        return Redirect::route('fdpMeeting.index',[$type, $staffId])->with('message', 'Fdp Meeting Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $staffId, $id)
    {
        $meeting  = FdpMeeting::find($id);
        return view("admin.staffActivity.fdpMeeting.editMeeting")->with("meeting", $meeting)
        ->with("staffId", $staffId)->with("type", $type);;
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
    public function update(Request $request,$type, $staffId,  $id)
    {
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string'],
            'level' => ['required', 'string'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'place' => ['required', 'string'], 
            'desc' => ['required', 'string'],  
            'organiser' => ['required', 'string'],  
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
            'typeOfMeeting' => $data['type'], 
            'place' => $data['place'],
            'organisers' => $data['organiser'],
            'department' => $data['dept']]);

        return Redirect::route('fdpMeeting.index',[$type, $staffId])->with('message', 'Meeting Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($type, $staffId, $id)
    {
        $meeting  = FdpMeeting::find($id);
        $meeting->delete();
        return Redirect::route('fdpMeeting.index',[$type, $staffId])->with('message', 'FDP Meeting Deleted Succesfully');
    }
}
