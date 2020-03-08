<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dept;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Redirect;

class AdminDeptController extends Controller
{
    public function viewDept() {
        $data = Dept::all();
        return view('admin.viewDept')->with('depts',$data);
    }
    public function addDept(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'min:3', 'max:255', 'unique:depts'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
        ]);

        $data = $request->all();

        Dept::create([
            'deptId' => 'd'.uniqid(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
        ]); 
        return Redirect::route('admin.viewDept')->with('message', 'Department Added Succesfully');
    }
    public function show($id) {
        $data = Dept::find($id);

        return view("admin.editDept")->with("dept",$data);
    }
    public function updateDept(Request $request) {
        if($request['password'] == '') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'min:3', 'max:255'], 
            ]);
            $data = $request->all();
            DB::table('depts')
                ->where('id','=',$data['id'])
                ->update(['name' => $data['name'], 'email' => $data['email']]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'min:3', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'], 
            ]);
            $data = $request->all();

            DB::table('depts')
                ->where('id','=',$data['id'])
                ->update(['name' => $data['name'], 'email' => $data['email'], 'password'=> Hash::make($data['password'])]);
        }
         
        return Redirect::route('admin.viewDept')->with('message', 'Department Details Updated Succesfully');
    }
    public function delete($id) {
        $user = Dept::find($id);
        $user->delete();
        
        return Redirect::route('admin.viewDept')->with('message', 'Department Removed Succesfully');   
    }
}
