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
    public function index($staffId)
    {
        $seminar = DB::table("seminar_organiseds")
                ->where("userId","=",$staffId)
                ->latest()
                ->get(); 
        if(substr($staffId,0,1) == "d") {
            $user = DB::table("depts")->where("deptId",$staffId)->limit(1)->get();
        } else if($staffId == 000) {
            $user['0'] = ['name' => "Admin"]; 
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        } 
        return view("admin.staffActivity.seminarOrganised.viewSeminars")->with("seminar", $seminar)
        ->with("staffId", $staffId)->with("user", $user);
    } 

    public function create($staffId)
    {
        return view("admin.staffActivity.seminarOrganised.addSeminar")->with("staffId", $staffId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $staffId)
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
            'userId' => $staffId
        ]); 
        return Redirect::route('seminarOrganised.index',$staffId)->with('message', 'Seminar Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staffId, $id)
    {
        $seminar  = SeminarOrganised::find($id);
        return view("admin.staffActivity.seminarOrganised.editSeminar")
            ->with("seminar", $seminar)->with("staffId", $staffId);
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
    public function update(Request $request,$staffId,  $id)
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

        return Redirect::route('seminarOrganised.index',$staffId)->with('message', 'Seminars Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($staffId, $id)
    {
        $achive = SeminarOrganised::find($id);
        $achive->delete();
        return Redirect::route('seminarOrganised.index',$staffId)->with('message', 'Seminar Deleted Succesfully');
    }
}
