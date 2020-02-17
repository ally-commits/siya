<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffProfile;
use DB;
use Redirect;
use Auth;

use App\StaffQualification;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile($active) {
        $data = DB::table("staff_profiles")
            ->where("userId","=",Auth::user()->id)
            ->get();
        
        $qlf = DB::table("staff_qualifications")
            ->where("userId","=",Auth::user()->id)
            ->get();
        if(count($data) == 0)
            $newUser = true;
        else 
            $newUser = false;
        return view("staff.profile")->with("profile",$data)->with('newUser', $newUser)->with('qualification', $qlf)
                                    ->with('active', $active);
    }
    public function addProfile(Request $request) { 
        $data = $request->all();
        $request->validate([
            'dob' => ['required', 'date'],
            'phoneNumber' => ['required', 'integer'],
            'gender' => ['required', 'string'], 
            'department' => ['required', 'string'], 
            'address' => ['required', 'string'], 
            'bloodGroup' => ['required', 'string'], 
            'image' => ['required','image','mimes:jpeg,png,jpg'],
        ]); 
        $image = $request->file('image');
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $image->move('images/profiles', $imageName);

        StaffProfile::create([
            'dob' => $data['dob'],
            'address' => $data['address'], 
            'phoneNumber' => $data['phoneNumber'],
            'gender' => $data['gender'], 
            'bloodGroup' => $data['bloodGroup'],
            'department' => $data['department'],
            'userId' => Auth::user()->id,
            'departmentId' => 1 ,
            'image' => 'images/profiles/' . $imageName
        ]); 
        return Redirect::route('staffProfile',1)->with('message', 'Profile Updated Succesfully');
    }
    public function addQualification(Request $request) { 
        $data = $request->all();
        $request->validate([
            'college' => ['required', 'string'],
            'year' => ['required', 'date'],
            'course' => ['required', 'string'],
            'place' => ['required', 'string'],  
        ]);  

        StaffQualification::create([
            'year' => $data['year'], 
            'course' => $data['course'], 
            'place' => $data['place'], 
            'college' => $data['college'], 
            'userId' => Auth::user()->id
        ]); 
        return Redirect::route('staffProfile',2)->with('message', 'Staff Qualification Added Succesfully');
    }
    public function qualification() {
        return view("staff.addQualification");
    }
    public function editProfile(Request $request) {
        $data = $request->all(); 
        $request->validate([ 
            'dob' => ['required', 'date'],
            'phoneNumber' => ['required', 'integer'],
            'gender' => ['required', 'string'], 
            'department' => ['required', 'string'], 
            'address' => ['required', 'string'], 
            'bloodGroup' => ['required', 'string'],  
        ]);
        if($request['image'] != null) { 
            $request->validate([ 
                'image' => ['required','image','mimes:jpeg,png,jpg'],
            ]);
            $image = $request->file('image');
            $imageName = time().'.'.$data['image']->getClientOriginalExtension();
            $image->move('images/profiles', $imageName);

            DB::table('staff_profiles')
                ->where('userId' ,'=', Auth::user()->id)
                ->update(['image' => 'images/profiles/'.$imageName]);
        }

        DB::table('staff_profiles')
            ->where('userId' ,'=', Auth::user()->id)
            ->update(
                    ['phoneNumber' => $data['phoneNumber'],
                    'dob' => $data['dob'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'department' => $data['department'],
                    'bloodGroup' => $data['bloodGroup']
                ]); 
        
        return Redirect::route('staffProfile',1)->with('message', 'Profile Updated Succesfully'); 
    }
    public function removeQualification($id) {
        $adr = StaffQualification::find($id);
        $adr->delete();
        
        return Redirect::route('staffProfile',2)->with('message', 'Qualification removed Succesfully');
    }
}
