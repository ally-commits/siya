<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\SeminarOrganised;
use Auth;

class AdminSeminarOrganisedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type,$staffId)
    {
        if($type == "staff") {
            $value = "userId";
        } else if($type == "admin") {
            $value = "adminId";
        } else if($type == "department") {
            $value = "deptId";
        }
        $seminar = DB::table("seminar_organiseds")
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
        return view("admin.staffActivity.seminarOrganised.viewSeminars")->with("seminar", $seminar)
        ->with("staffId", $staffId)->with("user", $user)->with("type",$type);
    } 

    public function create($type, $staffId)
    {
        return view("admin.staffActivity.seminarOrganised.addSeminar")->with("staffId", $staffId)->with("type",$type);
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
            'department' => ['required', 'string'],  
            'place' => ['required', 'string'],    
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'title' => ['required', 'string'],     
            'speaker' => ['required', 'string'],   
            'collabAgency' => ['required', 'string'],    
            'beneficiaries' => ['required', 'string'],    
            'topic' => ['required', 'string'],    
        ]);   
        if($type == "staff") {
            $value = "userId";
        } else if($type == "admin") {
            $value = "adminId";
        } else if($type == "department") {
            $value = "deptId";
        }
        SeminarOrganised::create([
            'department' => $data['department'], 
            'title' => $data['title'], 
            'collabAgency' => $data['collabAgency'], 
            'placeAndDesignation' => $data['place'], 
            'date' => $data['date'],
            'level' => $data['level'], 
            'topic' => $data['topic'], 
            'title' => $data['title'], 
            'speaker' => $data['speaker'], 
            'beneficiaries' => $data['beneficiaries'], 
            $value => $staffId
        ]); 
        return Redirect::route('seminarOrganised.index',[$type, $staffId])->with('message', 'Seminar Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $staffId, $id)
    {
        $seminar  = SeminarOrganised::find($id);
        return view("admin.staffActivity.seminarOrganised.editSeminar")
            ->with("seminar", $seminar)->with("staffId", $staffId)->with("type",$type);
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
            'department' => ['required', 'string'],  
            'place' => ['required', 'string'],    
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'title' => ['required', 'string'],    
            'speaker' => ['required', 'string'],   
            'collabAgency' => ['required', 'string'],    
            'beneficiaries' => ['required', 'string'],    
            'topic' => ['required', 'string'],    
        ]);
        DB::table("seminar_organiseds")
                ->where("id","=",$id)
                ->update([
                    'department' => $data['department'], 
                    'title' => $data['title'], 
                    'collabAgency' => $data['collabAgency'], 
                    'placeAndDesignation' => $data['place'], 
                    'date' => $data['date'],
                    'level' => $data['level'], 
                    'topic' => $data['topic'], 
                    'title' => $data['title'], 
                    'speaker' => $data['speaker'], 
                    'beneficiaries' => $data['beneficiaries'],]);

        return Redirect::route('seminarOrganised.index',[$type, $staffId])->with('message', 'Seminars Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($type, $staffId, $id)
    {
        $achive = SeminarOrganised::find($id);
        $achive->delete();
        return Redirect::route('seminarOrganised.index',[$type, $staffId])->with('message', 'Seminar Deleted Succesfully');
    }
}
