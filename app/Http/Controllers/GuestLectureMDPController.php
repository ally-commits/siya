<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\GuestLectureMDP;
use Auth;

class GuestLectureMDPController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $lecture = DB::table("guest_lecture_m_d_p_s")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.guestLecture.viewLectures")->with("lectures", $lecture);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.guestLecture.addLecture");
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
            'userId' => Auth::user()->id,
            'adminId' => null
        ]); 
        return Redirect::action('GuestLectureMDPController@index')->with('message', 'Guest Lecture Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecture  = GuestLectureMDP::find($id);
        return view("staff.guestLecture.editLecture")->with("lecture", $lecture);
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
                    'date' => $data['date'],   
                    'designation' => $data['designation'],
                    'topic' => $data['topic'],
                    'beneficiaries' => $data['beneficiaries'],
                    'place' => $data['place'],]);

        return Redirect::action('GuestLectureMDPController@index')->with('message', 'Guest Lecture Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $lecture  = GuestLectureMDP::find($id);
        $lecture->delete();
        return Redirect::action('GuestLectureMDPController@index')->with('message', 'Guest Lecture Deleted Succesfully');
    }
}
