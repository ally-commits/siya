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
    public function index($staffId)
    {
        $publications = DB::table("publications")
                ->where("userId","=",$staffId)
                ->latest()
                ->get();
        if($staffId == 000) {
            $user['0'] = ['name' => "Admin"]; 
        } else {
            $user = DB::table("users")->where("id","=",$staffId)->limit(1)->get();
        }
        return view("admin.staffActivity.publication.viewPublications")
        ->with("user", $user)
        ->with("publications", $publications)->with("staffId", $staffId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($staffId)
    {
        return view("admin.staffActivity.publication.addPublication")->with("staffId", $staffId);
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
            'name' => ['required', 'string'],
            'num' => ['required', 'string'],
            'collab' => ['required', 'string'],   
        ]);   
        Publications::create([
            'name' => $data['name'], 
            'publication_number' => $data['num'], 
            'collabration' => $data['collab'],   
            'userId' => $staffId
        ]); 
        return Redirect::route('publication.index',$staffId)->with('message', 'Publication Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($staffId,$id)
    {
        $publication = Publications::find($id);
        return view("admin.staffActivity.publication.editPublication")->with("publication", $publication)->with("staffId", $staffId);
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
            'num' => ['required', 'string'],
            'collab' => ['required', 'string'],   
        ]);  
        DB::table("publications")
                ->where("id","=",$id)
                ->update(['name' => $data['name'], 
                'publication_number' => $data['num'], 
                'collabration' => $data['collab'], ]);

        return Redirect::route('publication.index',$staffId)->with('message', 'Publication Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($staffId, $id)
    {
        $publication  = Publications::find($id);
        $publication->delete();
        return Redirect::route('publication.index',$staffId)->with('message', 'Publication Deleted Succesfully');
    }
}
