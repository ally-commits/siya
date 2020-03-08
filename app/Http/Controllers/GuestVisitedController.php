<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\GuestVisited;
use Auth;

class GuestVisitedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $visits = DB::table("guest_visiteds")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.guestVisited.viewVisits")->with("visits", $visits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.guestVisited.addVisit");
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
            'date' => ['required', 'date'],  
            'designation' => ['required', 'string'],  
            'activityHeld' => ['required', 'string'],  
        ]);  

        GuestVisited::create([
            'name' => $data['name'],  
            'date' => $data['date'],   
            'designation' => $data['designation'],
            'activityHeld' => $data['activityHeld'],
            'userId' => Auth::user()->id
        ]); 
        return Redirect::action('GuestVisitedController@index')->with('message', 'Guest Visit Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit  = GuestVisited::find($id);
        return view("staff.guestVisited.editVisit")->with("visit", $visit);
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

        return Redirect::action('GuestVisitedController@index')->with('message', 'Visits Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $visit  = GuestVisited::find($id);
        $visit->delete();
        return Redirect::action('GuestVisitedController@index')->with('message', 'Visit Deleted Succesfully');
    }
}
