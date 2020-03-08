<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\GuestVisited;
use Auth;

class AdminGuestVisitedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($staffId)
    {
        $visits = DB::table("guest_visiteds")
                ->where("userId","=",$staffId)
                ->latest()
                ->get();
        if($staffId == 000) {
            $user['0'] = ['name' => "Admin"]; 
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        }
        return view("admin.staffActivity.guestVisited.viewVisits")->with("user", $user)
        ->with("visits", $visits)->with("staffId", $staffId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($staffId)
    {
        return view("admin.staffActivity.guestVisited.addVisit")->with("staffId", $staffId);
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
            'name' => ['required', 'string'], 
            'date' => ['required', 'date'],  
            'designation' => ['required', 'string'],  
            'activityHeld' => ['required', 'string'],  
        ]);  

        GuestVisited::create([
            'name' => $data['name'],  
            'date' => $data['date'],   
            'designation' => $data['designation'],
            'activityHeld' => $data['activityHeld'],
            'userId' => $staffId
        ]); 
        return Redirect::route('guestVisited.index',$staffId)->with('message', 'Guest Visit Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staffId,$id)
    {
        $visit  = GuestVisited::find($id);
        return view("admin.staffActivity.guestVisited.editVisit")->with("visit", $visit)->with("staffId",$staffId);
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
            'name' => ['required', 'string'], 
            'date' => ['required', 'date'],  
            'designation' => ['required', 'string'],  
            'activityHeld' => ['required', 'string'],
        ]);  
        DB::table("guest_visiteds")
                ->where("id","=",$id)
                ->update([
                    'name' => $data['name'],  
                    'date' => $data['date'],   
                    'designation' => $data['designation'],
                    'activityHeld' => $data['activityHeld'],]);

        return Redirect::route('guestVisited.index',$staffId)->with('message', 'Visits Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($staffId, $id)
    {
        $visit  = GuestVisited::find($id);
        $visit->delete();
        return Redirect::route('guestVisited.index',$staffId)->with('message', 'Visit Deleted Succesfully');
    }
}
