<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\GuestLectureMDP;
use Auth;

class AdminGuestLectureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type, $staffId)
    {
        $value = $type == "admin" ? "adminId" : "userId";
        $lecture = DB::table("guest_lecture_m_d_p_s")
                ->where($value,"=",$staffId)
                ->latest()
                ->get();

        if($type == "admin") {
            $user = DB::table("admins")->where("id","=",$staffId)->limit(1)->get();
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        }
        return view("admin.staffActivity.guestLecture.viewLectures")
            ->with("lectures", $lecture)
            ->with("user", $user)
            ->with("staffId", $staffId)
            ->with("type",$type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $staffId)
    {
        return view("admin.staffActivity.guestLecture.addLecture")->with("staffId", $staffId)->with("type",$type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$type, $staffId)
    {
        $data = $request->all();
        $request->validate([  
            'date' => ['required', 'date'],  
            'resourcePerson' => ['required', 'string'],  
            'place' => ['required', 'string'],  
            'topic' => ['required', 'string'],  
            'department' => ['required', 'string'],  
            'beneficiaries' => ['required', 'string'],  
            'designation' => ['required', 'string'],   
        ]);  
        if($type == "staff") {
            $value = "userId";
        } else if($type == "admin") {
            $value = "adminId";
        } 
        GuestLectureMDP::create([
            'resourcePerson' => $data['resourcePerson'],  
            'place' => $data['place'],  
            'date' => $data['date'],   
            'department' => $data['department'],   
            'designation' => $data['designation'],
            'topic' => $data['topic'],
            'beneficiaries' => $data['beneficiaries'],
            'place' => $data['place'],
            $value => $staffId
        ]); 
        return Redirect::route('guestLecture.index',[$type, $staffId])->with('message', 'Guest Lecture Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $staffId, $id)
    {
        $lecture  = GuestLectureMDP::find($id);
        return view("admin.staffActivity.guestLecture.editLecture")->with("lecture", $lecture)
        ->with("staffId",$staffId)->with("type", $type);
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
    public function update(Request $request,$type, $staffId, $id)
    {
        $data = $request->all();
 
        $request->validate([
            'date' => ['required', 'date'],  
            'resourcePerson' => ['required', 'string'],  
            'place' => ['required', 'string'],  
            'topic' => ['required', 'string'],  
            'department' => ['required', 'string'],  
            'beneficiaries' => ['required', 'string'],  
            'designation' => ['required', 'string'],
        ]);  
        DB::table("guest_lecture_m_d_p_s")
                ->where("id","=",$id)
                ->update([
                    'resourcePerson' => $data['resourcePerson'],  
                    'place' => $data['place'],  
                    'department' => $data['department'],
                    'date' => $data['date'],   
                    'designation' => $data['designation'],
                    'topic' => $data['topic'],
                    'beneficiaries' => $data['beneficiaries'],
                    'place' => $data['place'],]);

        return Redirect::route('guestLecture.index',[$type, $staffId])->with('message', 'Guest Lecture Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($type, $staffId, $id)
    {
        $lecture  = GuestLectureMDP::find($id);
        $lecture->delete();
        return Redirect::route('guestLecture.index',[$type, $staffId])->with('message', 'Guest Lecture Deleted Succesfully');
    }
}
