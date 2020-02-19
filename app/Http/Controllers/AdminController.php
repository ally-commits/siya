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
        return view('admin.home');
    }
    public function viewStaff() {
        $data = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id') 
            ->select('users.*','staff_profiles.*') 
            ->get();  
        $qlf = StaffQualification::get();  
        return view("admin.viewStaff")->with("staffs",$data)->with("qualification", $qlf);
    }
    public function addStaff(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'min:4', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
            'age' => ['required','integer'],
            'dob' => ['required','date'],
            'phoneNumber' => ['required','integer'],
            'expirence' => ['required','string'], 
        ]);

        $data = $request->all(); 
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
        ]); 
        StaffProfile::create([
            'dob' => $data['dob'],
            'address' => $data['address'], 
            'phoneNumber' => $data['phoneNumber'],
            'gender' => $data['gender'], 
            'bloodGroup' => $data['bloodGroup'],
            'department' => $data['department'],
            'expirence' => $data['expirence'],
            'userId' => $user->id,
            'age' => $data['age'],
            'departmentId' => 1 ,
            'image' => 'images/profiles/default.jpg'
        ]);  
        return Redirect::route('admin.viewStaff')->with('message', 'Staff Added Succesfully');
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
        return Redirect::route('admin.viewStaff')->with('message', 'Staff Qualification Added Succesfully');
    }
    public function updateStaff(Request $request) {
        if($request['password'] == '') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'min:4', 'max:255'], 
            ]);
            $data = $request->all();
            DB::table('users')
                ->where('id','=',$data['id'])
                ->update(['name' => $data['name'], 'email' => $data['email']]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'min:4', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'], 
            ]);
            $data = $request->all();

            DB::table('users')
                ->where('id','=',$data['id'])
                ->update(['name' => $data['name'], 'email' => $data['email'], 'password'=> Hash::make($data['password'])]);
        }
         
        return Redirect::route('admin.viewStaff')->with('message', 'Staff Updated Succesfully');
    }
    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        
        return Redirect::route('admin.viewStaff')->with('message', 'Staff Removed Succesfully');   
    }
} 