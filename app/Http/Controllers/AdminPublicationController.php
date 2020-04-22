<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Publications;
use Auth;

class AdminPublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type, $staffId)
    {
        $value = $type == "admin" ? "adminId" : "userId";
        $publications = DB::table("publications")
                ->where($value,"=",$staffId)
                ->latest()
                ->get();
        if($type == "admin") {
            $user = DB::table("admins")->where("id","=",$staffId)->limit(1)->get();
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        } 
        return view("admin.staffActivity.publication.viewPublications")
        ->with("user", $user)->with("type",$type)
        ->with("publications", $publications)->with("staffId", $staffId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $staffId)
    {
        return view("admin.staffActivity.publication.addPublication")->with("staffId", $staffId)->with("type",$type);
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
            'collab' => ['required', 'string'],  
            'date' => ['required',"date"],
            'index' => ['required',"string"],
            'subject' => ['required',"string"],
            'pages' => ['required',"integer"],
            'type' => ['required',"string"],
            'issues' => ['required',"string"],
            'volume' => ['required',"string"]   
        ]);
        if($type == "staff") {
            $value = "userId";
        } else if($type == "admin") {
            $value = "adminId";
        }     
        Publications::create([
            'name' => $data['name'],  
            'date' => $data['date'], 
            'indexing' => $data['index'], 
            'type' => $data['type'], 
            'subject' => $data['subject'], 
            'NumberOfPages' => $data['pages'], 
            'issues' => $data['issues'], 
            'volume' => $data['volume'], 
            'collabration' => $data['collab'], 
            $value => $staffId
        ]); 
        return Redirect::route('publication.index',[$type, $staffId])->with('message', 'Publication Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $staffId,$id)
    {
        $publication = Publications::find($id);
        return view("admin.staffActivity.publication.editPublication")->with("publication", $publication)->with("staffId", $staffId)->with("type",$type);
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
            'collab' => ['required', 'string'],  
            'date' => ['required',"date"],
            'index' => ['required',"string"],
            'subject' => ['required',"string"],
            'pages' => ['required',"integer"],
            'type' => ['required',"string"],
            'issues' => ['required',"string"],
            'volume' => ['required',"string"] 
        ]);  
        DB::table("publications")
                ->where("id","=",$id)
                ->update(['name' => $data['name'],   
                        'date' => $data['date'], 
                        'indexing' => $data['index'], 
                        'type' => $data['type'], 
                        'subject' => $data['subject'], 
                        'NumberOfPages' => $data['pages'], 
                        'issues' => $data['issues'], 
                        'volume' => $data['volume'], 
                        'collabration' => $data['collab'], ]);

        return Redirect::route('publication.index',[$type, $staffId])->with('message', 'Publication Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($type, $staffId, $id)
    {
        $publication  = Publications::find($id);
        $publication->delete();
        return Redirect::route('publication.index',[$type, $staffId])->with('message', 'Publication Deleted Succesfully');
    }
}
