<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

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
        $data = User::all();
        return view('admin.viewStaff')->with('staffs',$data);
    }
    public function addStaff(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'min:4', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
        ]); 
        return Redirect::route('admin.viewStaff')->with('message', 'Staff Added Succesfully');
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