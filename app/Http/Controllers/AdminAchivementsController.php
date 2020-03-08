<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Achivements;
use Auth;

class AdminAchivementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($staffId)
    {
        $achive = DB::table("achivements")
                ->where("userId","=",$staffId)
                ->latest()
                ->get();
        if($staffId == 000) {
            $user['0'] = ['name' => "Admin"]; 
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        }
        return view("admin.staffActivity.achivements.viewAchivements")
            ->with("achive", $achive)
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
        return view("admin.staffActivity.achivements.addAchivement")->with("staffId", $staffId);
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
            'userId' => $staffId
        ]); 
        return Redirect::route('achivements.index', $staffId)->with('message', 'Achhivements Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staffId, $id)
    {
        $achive  = Achivements::find($id);
        return view("admin.staffActivity.achivements.editAchivement")
            ->with("achive", $achive)
            ->with("staffId", $staffId);
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
    public function update(Request $request, $staffId, $id)
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

        return Redirect::route('achivements.index',$staffId)->with('message', 'Achivements Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($staffId, $id)
    {
        $achive  = Achivements::find($id);
        $achive->delete();
        return Redirect::route('achivements.index', $staffId)->with('message', 'Achivement Deleted Succesfully');
    }
}
