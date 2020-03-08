<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssociationProgram;
use Auth;
use Redirect;
use DB;

class AdminAssociationController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($staffId)
    {
        $programs = DB::table("association_programs")
                ->where("userId","=",$staffId)
                ->latest()
                ->get();
        if($staffId == 000) {
            $user['0'] = ['name' => "Admin"]; 
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        }

        return view("admin.staffActivity.association.viewAssociation")->with("user", $user)
        ->with("programs", $programs)->with("staffId", $staffId);
    } 
    public function create($staffId)
    {
        return view("admin.staffActivity.association.addAssociation")->with("staffId", $staffId);;
    } 
    public function store(Request $request,$staffId)
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
            'userId' => $staffId
        ]); 
        return Redirect::route('association.index',$staffId)->with('message', 'Association Program Added Succesfully');
    } 
    public function show($staffId, $id)
    {
        $program  = AssociationProgram::find($id);
        return view("admin.staffActivity.association.editAssociation")
            ->with("program", $program)
            ->with("staffId", $staffId);
    } 
    public function edit($id)
    {
        
    } 
    public function update(Request $request, $staffId, $id)
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

        return Redirect::route('association.index',$staffId)->with('message', 'Association Program Updated Succesfully');   
    } 
    public function delete($staffId, $id)
    {
        $program  = AssociationProgram::find($id);
        $program->delete();
        return Redirect::route('association.index',$staffId)->with('message', 'Association Program Deleted Succesfully');
    }
}
