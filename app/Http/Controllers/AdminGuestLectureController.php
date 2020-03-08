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
    public function index($staffId)
    {
        $lecture = DB::table("guest_lecture_m_d_p_s")
                ->where("userId","=",$staffId)
                ->latest()
                ->get();
        if($staffId == 000) {
            $user['0'] = ['name' => "Admin"]; 
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        }
        return view("admin.staffActivity.guestLecture.viewLectures")
            ->with("lectures", $lecture)
            ->with("user", $user)
            ->with("staffId", $staffId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($staffId)
    {
        return view("admin.staffActivity.guestLecture.addLecture")->with("staffId", $staffId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$staffId)
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

        GuestLectureMDP::create([
            'resourcePerson' => $data['resourcePerson'],  
            'place' => $data['place'],  
            'date' => $data['date'],   
            'department' => $data['department'],   
            'designation' => $data['designation'],
            'topic' => $data['topic'],
            'beneficiaries' => $data['beneficiaries'],
            'place' => $data['place'],
            'userId' => Auth::user()->id
        ]); 
        return Redirect::route('guestLecture.index',$staffId)->with('message', 'Guest Lecture Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staffId, $id)
    {
        $lecture  = GuestLectureMDP::find($id);
        return view("admin.staffActivity.guestLecture.editLecture")->with("lecture", $lecture)->with("staffId",$staffId);
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
    public function update(Request $request,$staffId, $id)
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
                    'department' => ['required', 'string'],
                    'date' => $data['date'],   
                    'designation' => $data['designation'],
                    'topic' => $data['topic'],
                    'beneficiaries' => $data['beneficiaries'],
                    'place' => $data['place'],]);

        return Redirect::route('guestLecture.index',$staffId)->with('message', 'Guest Lecture Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($staffId, $id)
    {
        $lecture  = GuestLectureMDP::find($id);
        $lecture->delete();
        return Redirect::route('guestLecture.index',$staffId)->with('message', 'Guest Lecture Deleted Succesfully');
    }
}
