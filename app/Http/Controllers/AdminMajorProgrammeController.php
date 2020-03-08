<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\MajorProgrammes;
use Auth;

class AdminMajorProgrammeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($staffId)
    {
        $program = DB::table("major_programmes")
                ->where("userId","=",$staffId)
                ->latest()
                ->get();
        if($staffId == 000) {
            $user['0'] = ['name' => "Admin"]; 
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        }
        return view("admin.staffActivity.majorProgram.viewPrograms")
            ->with("programs", $program)
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
        return view("admin.staffActivity.majorProgram.addProgram")->with("staffId", $staffId);;
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
            'duration' => ['required', 'string'],  
            'programme' => ['required', 'string'],  
            'facultyAssociation' => ['required', 'string'],  
            'noOfBeneficiaries' => ['required', 'string'],  
            'department' => ['required', 'string'],  
            'level' => ['required', 'string'],     
        ]);  

        MajorProgrammes::create([ 
            'programme' => $data['programme'],  
            'duration' => $data['duration'],   
            'department' => $data['department'],   
            'facultyAssociation' => $data['facultyAssociation'],
            'level' => $data['level'],
            'noOfBeneficiaries' => $data['noOfBeneficiaries'], 
            'userId' => $staffId
        ]); 
        return Redirect::route('majorProgram.index',$staffId)->with('message', 'Major Programme Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staffId,$id)
    {
        $program  = MajorProgrammes::find($id);
        return view("admin.staffActivity.majorProgram.editProgram")->with("program", $program)->with('staffId',$staffId);
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
            'duration' => ['required', 'string'],  
            'programme' => ['required', 'string'],  
            'facultyAssociation' => ['required', 'string'],  
            'noOfBeneficiaries' => ['required', 'string'],  
            'department' => ['required', 'string'],  
            'level' => ['required', 'string'],     
        ]);  

        DB::table("major_programmes")
                ->where("id","=",$id)
                ->update([
                    'programme' => $data['programme'],  
                    'duration' => $data['duration'],   
                    'department' => $data['department'],   
                    'facultyAssociation' => $data['facultyAssociation'],
                    'level' => $data['level'],
                    'noOfBeneficiaries' => $data['noOfBeneficiaries'], ]);

        return Redirect::route('majorProgram.index',$staffId)->with('message', 'Major Program Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($staffId,$id)
    {
        $program  = MajorProgrammes::find($id);
        $program->delete();
        return Redirect::route('majorProgram.index',$staffId)->with('message', 'Major Program Deleted Succesfully');
    }
}
