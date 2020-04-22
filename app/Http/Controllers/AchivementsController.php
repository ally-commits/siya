<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Achivements;
use Auth;

class AchivementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $achive = DB::table("achivements")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.achivements.viewAchivements")->with("achive", $achive);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.achivements.addAchivement");
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
            'department' => ['required', 'string'],
            'achive' => ['required', 'string'],
            'place' => ['required', 'string'],  
            'organisation' => ['required', 'string'],  
            'nature' => ['required', 'string'],
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'guide' => ['required', 'string'],    
        ]);   
        Achivements::create([
            'name' => $data['name'],
            'dept' => $data['department'],
            'achive' => $data['achive'],
            'place' => $data['place'],
            'organisation' => $data['organisation'],
            'nature' => $data['nature'],
            'date' => $data['date'],
            'level' => $data['level'],
            'guidedBy' => $data['guide'],
            'userId' => Auth::user()->id,
            'adminId' => null
        ]); 
        return Redirect::action('AchivementsController@index')->with('message', 'Achhivements Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $achive  = Achivements::find($id);
        return view("staff.achivements.editAchivement")->with("achive", $achive);
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
            'department' => ['required', 'string'],
            'achive' => ['required', 'string'],
            'place' => ['required', 'string'],  
            'organisation' => ['required', 'string'],  
            'nature' => ['required', 'string'],
            'date' => ['required', 'date'],
            'level' => ['required', 'string'],
            'guide' => ['required', 'string'],    
        ]);  
        DB::table("achivements")
                ->where("id","=",$id)
                ->update([
                    'name' => $data['name'],
                    'dept' => $data['department'],
                    'achive' => $data['achive'],
                    'place' => $data['place'],
                    'organisation' => $data['organisation'],
                    'nature' => $data['nature'],
                    'date' => $data['date'],
                    'level' => $data['level'],
                    'guidedBy' => $data['guide'],]);

        return Redirect::action('AchivementsController@index')->with('message', 'Achivements Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $achive  = Achivements::find($id);
        $achive->delete();
        return Redirect::action('AchivementsController@index')->with('message', 'Achivement Deleted Succesfully');
    }
}
