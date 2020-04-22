<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use App\StaffProfile;
use App\StaffQualification;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $value_arr = ['users' => "Staffs", "depts" => 'Departments', 'achivements' => "Achievements",'association_programs' => "Association Programmes",
                    'fdp_meetings' => "FDP Meetings",'papers' => 'Papers Presented',
                    'seminar_organiseds' => 'Seminar Organised','seminar_attendeds' => 'Seminar Attended',
                    'publications' => 'Publication','guest_visiteds' => 'Guest Visited', 'guest_lecture_m_d_p_s'
                    => "Guest Lecture MDP", 'major_programmes' => 'Major Programmes'];
                    
        $icons = ['users' => "ti-user", "depts" => 'ti-id-badge', 'achivements' => "ti-flag-alt",'association_programs' => "ti-layout",
                    'fdp_meetings' => "ti-link",'papers' => 'ti-layers-alt',
                    'seminar_organiseds' => 'ti-bookmark-alt','seminar_attendeds' => 'ti-reload',
                    'publications' => 'ti-layers','guest_visiteds' => 'ti-car', 'guest_lecture_m_d_p_s'
                    => "ti-shift-left-alt", 'major_programmes' => 'ti-vector'];
        $value_count = [];
        $colors = ['text-danger','text-dark','text-info','text-warning','text-success','text-primary','text-secondary'];

        foreach($value_arr as $key=>$arr) {
            $value_count[$key] = DB::table($key)->count();
        } 
        return view('admin.home')->with("value_names",$value_arr)->with("value_count", $value_count)
                                ->with("icons",$icons)->with("colors", $colors);
    }
    public function viewStaff() {
        $data = DB::table('users')
            ->join("staff_profiles","staff_profiles.userId","users.id")
            ->select("users.*","staff_profiles.*","users.id")
            ->get();  
          
        return view("admin.viewStaff")->with("staffs",$data);
    }
    public function viewStaffDetails($userId) {
        $data = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id') 
            ->where("users.id",'=',$userId)
            ->select('users.*','staff_profiles.*') 
            ->get();  
 
        return view('admin.viewStaffDetails')->with("staff", $data)->with("userId",$userId);
    }
    public function getStaffDetails($userId) {
        $data = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id') 
            ->where("users.id",'=',$userId)
            ->select('users.*','staff_profiles.*') 
            ->get();  
 
        return view('admin.editStaffDetails')->with("staff", $data);
    }
    
    public function addStaff(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'min:4', 'max:255', 'unique:users'],  
            'dob' => ['required','date'],
            'phoneNumber' => ['required','digits:10'],
            'expirence' => ['required','string'], 
        ]);

        $data = $request->all(); 
        $id = uniqid();
        $user = User::create([
            'id' => $id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['phoneNumber']), 
        ]); 
        StaffProfile::create([
            'dob' => $data['dob'],
            'address' => $data['address'], 
            'phoneNumber' => $data['phoneNumber'],
            'gender' => $data['gender'], 
            'bloodGroup' => $data['bloodGroup'],
            'department' => $data['department'],
            'expirence' => $data['expirence'],
            'userId' => $id, 
            'departmentId' => 1,
            'image' => 'images/profiles/default.jpg'
        ]);    
        return Redirect::route('admin.getStaffQualification', $id)->with('message', 'Staff Added Succesfully')->with("userId", $id);
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
            'userId' => $data['userId']
        ]); 
        return Redirect::route('admin.getStaffQualification',[$data['userId']])->with('message', 'Staff Qualification Added Succesfully');
    }
    public function getQualification($userId) {
        $data = DB::table("staff_qualifications")
                ->where("userId","=", $userId)
                ->get();
        return view("admin.addQualification")->with("qualification", $data)->with("userId", $userId);
    }
    public function updateStaff(Request $request) {
        $data = $request->all(); 
        $request->validate([ 
            'dob' => ['required', 'date'],
            'phoneNumber' => ['required', 'integer'],
            'gender' => ['required', 'string'], 
            'department' => ['required', 'string'], 
            'address' => ['required', 'string'], 
            'bloodGroup' => ['required', 'string'], 
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'expirence' => ['required','integer']    
        ]);
         
        if($request->password != '') {
            $request->validate([
                'password' => ['required','min:8','confirmed']
            ]);
            DB::table("users")
            ->where("id", '=', $data['id'])
            ->update(['password' => Hash::make($data['password'])]);
        }

        DB::table('staff_profiles')
            ->where('userId' ,'=', $data['id'])
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
            ->where("id", '=', $data['id'])
            ->update(['name' => $data['name'], 'email' => $data['email']]);
        
        
        return Redirect::route('admin.viewStaffDetails',[$data['id']])->with('message', 'Staff data Updated Succesfully');
    }
    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        
        return Redirect::route('admin.viewStaff')->with('message', 'Staff Removed Succesfully');   
    }
    public function removeQualification($id) {
        $data = StaffQualification::find($id);
        $data->delete();
        
        return Redirect::route('admin.getStaffQualification',[$data['userId']])->with('message', 'Qualification removed Succesfully');
    }
} 