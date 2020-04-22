<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DeptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:dept');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value_arr = ['fdp_meetings' => "FDP Meetings", 'seminar_organiseds' => 'Seminar Organised',
                        'major_programmes' => 'Major Programmes'];
                    
        $icons = ['fdp_meetings' => "ti-link", 'seminar_organiseds' => 'ti-reload',
                    'major_programmes' => 'ti-vector'];
        $value_count = [];
        $colors = ['text-danger','text-dark','text-info','text-warning','text-success','text-primary','text-secondary'];

        foreach($value_arr as $key=>$arr) {
            $value_count[$key] = DB::table($key)->where("deptId",Auth::user()->id)->count();
        }  
        return view('dept.home')->with("value_names",$value_arr)->with("value_count", $value_count)
                    ->with("icons",$icons)->with("colors", $colors);
    }
    
}
