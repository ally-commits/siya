<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\SeminarAttended;
use Auth;

class AdminSeminarAttendedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type, $staffId)
    {
        $value = $type == "admin" ? "adminId" : "userId";
        $seminar = DB::table("seminar_attendeds")
                ->where($value,"=",$staffId)
                ->latest()
                ->get();
        if($type == "admin") {
            $user = DB::table("admins")->where("id","=",$staffId)->limit(1)->get();
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        } 
        return view("admin.staffActivity.seminarAttended.viewSeminars")->with("user", $user)
        ->with("seminar", $seminar)->with("staffId", $staffId)->with("type",$type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $staffId)
    {
        return view("admin.staffActivity.seminarAttended.addSeminar")->with("staffId", $staffId)
        ->with("type",$type);;
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
            'name' => ['required', 'string'],  
            'place' => ['required', 'string'],    
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'dept' => ['required', 'string'],
            'type' => ['required', 'string'],
            'title' => ['required', 'string'],    
               
        ]); 
        if($type == "staff") {
            $value = "userId";
        } else if($type == "admin") {
            $value = "adminId";
        }    
        SeminarAttended::create([
            'name' => $data['name'], 
            'title' => $data['title'], 
            'prize' => $data['prize'], 
            'dept' => $data['dept'], 
            'type' => $data['type'], 
            'place' => $data['place'], 
            'date' => $data['date'],
            'level' => $data['level'], 
            $value => $staffId
        ]); 
        return Redirect::route('seminarAttended.index',[$type, $staffId])->with('message', 'Seminar Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $staffId,$id)
    {
        $seminar  = SeminarAttended::find($id);
        return view("admin.staffActivity.seminarAttended.editSeminar")->with("seminar", $seminar)->with("staffId", $staffId)
        ->with("type",$type);
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
            'name' => ['required', 'string'],  
            'place' => ['required', 'string'],    
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'dept' => ['required', 'string'],
            'type' => ['required', 'string'],
            'title' => ['required', 'string'],    
              
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

        return Redirect::route('seminarAttended.index',[$type, $staffId])->with('message', 'SeminarAttended Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($type, $staffId, $id)
    {
        $achive  = SeminarAttended::find($id);
        $achive->delete();
        return Redirect::route('seminarAttended.index',[$type, $staffId])->with('message', 'Seminar Deleted Succesfully');
    }
}
