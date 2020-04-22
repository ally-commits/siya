<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\MajorProgrammes;
use Auth;

class DeptMajorProgramme extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dept');
    }
    public function index()
    {
        $program = DB::table("major_programmes")
                ->where("deptId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("dept.majorProgram.viewPrograms")->with("programs", $program);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dept.majorProgram.addProgram");
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
            'from' => ['required', 'date'],  
            'to' => ['required', 'date'],  
            'desc' => ['required', 'string'],  
            'programme' => ['required', 'string'],  
            'facultyAssociation' => ['required', 'string'],  
            'noOfBeneficiaries' => ['required', 'string'],  
            'department' => ['required', 'string'],  
            'level' => ['required', 'string'],     
        ]);   
        MajorProgrammes::create([ 
            'deptId' => Auth::user()->id,
            'programme' => $data['programme'],  
            'from' => $data['from'],   
            'to' => $data['to'],   
            'desc' => $data['desc'],   
            'department' => $data['department'],   
            'facultyAssociation' => $data['facultyAssociation'],
            'level' => $data['level'],
            'noOfBeneficiaries' => $data['noOfBeneficiaries'], 
            'deptId' => Auth::user()->id
        ]);  

        return Redirect::action('DeptMajorProgramme@index')->with('message', 'Major Programme Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program  = MajorProgrammes::find($id);
        return view("dept.majorProgram.editProgram")->with("program", $program);
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
            'from' => ['required', 'date'],  
            'to' => ['required', 'date'],  
            'desc' => ['required', 'string'],  
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
                    'from' => $data['from'],   
                    'to' => $data['to'],   
                    'desc' => $data['desc'],   
                    'department' => $data['department'],   
                    'facultyAssociation' => $data['facultyAssociation'],
                    'level' => $data['level'],
                    'noOfBeneficiaries' => $data['noOfBeneficiaries'], ]);

        return Redirect::action('DeptMajorProgramme@index')->with('message', 'Major Program Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $program  = MajorProgrammes::find($id);
        $program->delete();
        return Redirect::action('DeptMajorProgramme@index')->with('message', 'Major Program Deleted Succesfully');
    }
}
