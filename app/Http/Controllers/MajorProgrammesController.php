<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\MajorProgrammes;
use Auth;

class MajorProgrammesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $program = DB::table("major_programmes")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.majorProgram.viewPrograms")->with("programs", $program);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.majorProgram.addProgram");
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
            'programme' => ['required', 'string'],  
            'desc' => ['required', 'string'],  
            'facultyAssociation' => ['required', 'string'],  
            'noOfBeneficiaries' => ['required', 'string'],  
            'department' => ['required', 'string'],  
            'level' => ['required', 'string'],     
        ]);  

        MajorProgrammes::create([ 
            'programme' => $data['programme'],   
            'from' => $data['from'],   
            'to' => $data['to'],   
            'desc' => $data['desc'],   
            'department' => $data['department'],   
            'facultyAssociation' => $data['facultyAssociation'],
            'level' => $data['level'],
            'noOfBeneficiaries' => $data['noOfBeneficiaries'], 
            'userId' => Auth::user()->id
        ]); 
        return Redirect::action('MajorProgrammesController@index')->with('message', 'Major Programme Added Succesfully');
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
        return view("staff.majorProgram.editProgram")->with("program", $program);
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
            'programme' => ['required', 'string'],  
            'desc' => ['required', 'string'], 
            'facultyAssociation' => ['required', 'string'],  
            'noOfBeneficiaries' => ['required', 'string'],  
            'department' => ['required', 'string'],  
            'level' => ['required', 'string'],     
        ]);  

        DB::table("major_programmes")
                ->where("id","=",$id)
                ->update([
                    'from' => $data['from'],   
                    'to' => $data['to'],   
                    'desc' => $data['desc'],
                    'programme' => $data['programme'],   
                    'department' => $data['department'],   
                    'facultyAssociation' => $data['facultyAssociation'],
                    'level' => $data['level'],
                    'noOfBeneficiaries' => $data['noOfBeneficiaries'], ]);

        return Redirect::action('MajorProgrammesController@index')->with('message', 'Major Program Updated Succesfully');   
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
        return Redirect::action('MajorProgrammesController@index')->with('message', 'Major Program Deleted Succesfully');
    }
}
