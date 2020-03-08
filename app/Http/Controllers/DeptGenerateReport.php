<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DeptGenerateReport extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dept');
    } 
    public function index() {
        $profile = DB::table('depts') 
            ->where("id","=",Auth::user()->id)    
            ->limit(1)
            ->get(); 
        return view("dept.createReport")->with("dept", $profile);
    }
    public function getData(Request $request) {
        $data = $request->all(); 
        $profile = DB::table('depts') 
            ->where("id","=",Auth::user()->id)    
            ->limit(1)
            ->get();

        $deptData = [];
        $arr = ['fdp_meetings','seminar_organiseds','major_programmes'];
        foreach($data as $d) {
            foreach($arr as $a) {
                if($d == $a) {
                    $temp = DB::table($d) 
                        ->where($d.".userId","=", Auth::user()->deptId)
                        ->get(); 
                    $deptData[$d] = $temp;
                }
            }
        }
        $value_arr = ['fdp_meetings' => "FDP Meetings", 
                    'seminar_organiseds' => 'Seminar Organised', 'major_programmes'=> 'Major Programmes'];
        
        return view("dept.viewReport")->with("deptData", $deptData)
            ->with("profile", $profile)
            ->with("value_arr", $value_arr);
    }
}
