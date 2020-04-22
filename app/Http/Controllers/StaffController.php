<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StaffProfile;
use DB;
use Redirect;
use Auth;
use Hash;

use App\StaffQualification;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function changePassword() {
        return view("staff.changePassword");
    }
    public function updatePassword(Request $request) {
        $request->validate([
            'password' => ['required','min:8','confirmed']
        ]);

        $data = $request->all();
        DB::table("users")
        ->where("id", '=', Auth::user()->id)
        ->update(['password' => Hash::make($data['password'])]);

        return Redirect::route('staffDashboard')->with('message', 'Password Changed Succesfully'); 
    }
    public function profile() {
        $data = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id') 
            ->where("users.id",'=',Auth::user()->id)
            ->select('users.*','staff_profiles.*') 
            ->get();   
        return view("staff.profile")->with("staff", $data);
    }
    public function editProfile() { 
        $data = DB::table('users')
        ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id') 
        ->where("users.id",'=',Auth::user()->id)
        ->select('users.*','staff_profiles.*') 
        ->get();  
        return view("staff.editProfile")->with("staff", $data);
    } 
     
    public function updateProfile(Request $request) { 
        $data = $request->all(); 
        $request->validate([ 
            'dob' => ['required', 'date'],
            'phoneNumber' => ['required', 'digits:10'],
            'gender' => ['required', 'string'], 
            'name' => ['required','string'],
            'email' => ['required','string'],
            'expirence' => ['required','string'],
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
        if($request->password != '') {
            $request->validate([
                'password' => ['required','min:8','confirm']
            ]);
            DB::table("users")
            ->where("id", '=', Auth::user()->id)
            ->update(['password' => Hash::make($data['password'])]);
        }
        DB::table('staff_profiles')
            ->where('userId' ,'=', Auth::user()->id)
            ->update(
                    ['phoneNumber' => $data['phoneNumber'],
                    'dob' => $data['dob'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'department' => $data['department'],
                    'bloodGroup' => $data['bloodGroup'],
                    'expirence' => $data['expirence'],  
                ]); 
        DB::table("users")
            ->where("id", '=', Auth::user()->id)
            ->update(['name' => $data['name'], 'email' => $data['email']]); 
        
        return Redirect::route('staffProfile')->with('message', 'Profile Updated Succesfully'); 
    }
    public function viewQualification() {
        $qlf = DB::table("staff_qualifications")
                ->where("userId","=",Auth::user()->id)
                ->get();
        
        return view('staff.viewQualification')->with('qualification', $qlf);
    }
}
