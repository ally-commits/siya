<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Publications;
use Auth;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $publications = DB::table("publications")
                ->where("userId","=",Auth::user()->id)
                ->latest()
                ->get();

        return view("staff.publication.viewPublications")->with("publications", $publications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("staff.publication.addPublication");
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
            'staffname' => ['required', 'string'], 
            'collab' => ['required', 'string'],  
            'date' => ['required',"date"],
            'index' => ['required',"string"],
            'subject' => ['required',"string"],
            'pages' => ['required',"integer"],
            'type' => ['required',"string"],
            'issues' => ['required',"string"],
            'volume' => ['required',"string"]
        ]);   

        Publications::create([
            'name' => $data['name'],
            'staffname' => $data['staffname'],   
            'date' => $data['date'], 
            'indexing' => $data['index'], 
            'type' => $data['type'], 
            'subject' => $data['subject'], 
            'NumberOfPages' => $data['pages'], 
            'issues' => $data['issues'], 
            'volume' => $data['volume'], 
            'collabration' => $data['collab'],   
            'userId' => Auth::user()->id
        ]); 
        return Redirect::action('PublicationController@index')->with('message', 'Publication Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publications::find($id);
        return view("staff.publication.editPublication")->with("publication", $publication);
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
            'staffname' => ['required', 'string'],
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
                'staffname' => $data['staffname'], 
                'date' => $data['date'], 
                'indexing' => $data['index'], 
                'type' => $data['type'], 
                'subject' => $data['subject'], 
                'NumberOfPages' => $data['pages'], 
                'issues' => $data['issues'], 
                'volume' => $data['volume'], 
                'collabration' => $data['collab'],  ]);

        return Redirect::action('PublicationController@index')->with('message', 'Publication Updated Succesfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $publication  = Publications::find($id);
        $publication->delete();
        return Redirect::action('PublicationController@index')->with('message', 'Publication Deleted Succesfully');
    }
}
