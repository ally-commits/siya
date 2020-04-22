<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssociationProgram;
use Auth;
use Redirect;
use DB;

class AssociationProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $programs = DB::table("association_programs")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.association.viewAssociation")->with("programs", $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.association.addAssociation");
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
            'level' => ['required', 'string'],
            'date' => ['required', 'date'],
            'place' => ['required', 'string'],  
            'guest' => ['required', 'string'],  
            'num' => ['required', 'integer'],  
            'nature' => ['required', 'string'],  
        ]);  

        AssociationProgram::create([
            'name' => $data['name'], 
            'level' => $data['level'], 
            'date' => $data['date'], 
            'NumberOfStudents' => $data['num'], 
            'place' => $data['place'],
            'guest' => $data['guest'],
            'nature' => $data['nature'],
            'userId' => Auth::user()->id,
            'adminId' => null
        ]); 
        return Redirect::action('AssociationProgramController@index')->with('message', 'Association Program Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program  = AssociationProgram::find($id);
        return view("staff.association.editAssociation")->with("program", $program);
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
            'level' => ['required', 'string'],
            'date' => ['required', 'date'],
            'place' => ['required', 'string'],  
            'guest' => ['required', 'string'],  
            'num' => ['required', 'integer'],  
            'nature' => ['required', 'string'],  
        ]);  

        DB::table("association_programs")
                ->where("id","=",$id)
                ->update([
            'name' => $data['name'], 
            'level' => $data['level'], 
            'date' => $data['date'], 
            'NumberOfStudents' => $data['num'], 
            'place' => $data['place'],
            'guest' => $data['guest'],
            'nature' => $data['nature']]);

        return Redirect::action('AssociationProgramController@index')->with('message', 'Association Program Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $program  = AssociationProgram::find($id);
        $program->delete();
        return Redirect::action('AssociationProgramController@index')->with('message', 'Association Program Deleted Succesfully');
    }
}
