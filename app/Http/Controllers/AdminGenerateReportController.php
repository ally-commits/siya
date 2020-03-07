<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminGenerateReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index() {
        $data = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id')  
            ->select('users.*','staff_profiles.*') 
            ->get();  
        return view("admin.genrateReport")->with("staffs", $data);
    }
    public function viewData($staffId) {
        $profile = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id')
            ->where("staff_profiles.userId","=",$staffId)  
            ->select('users.*','staff_profiles.*') 
            ->limit(1)
            ->get(); 
        return view("admin.createReport")->with("staff", $profile);
    }
    public function getData(Request $request) {
        $data = $request->all();
        $profile = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id')
            ->where("staff_profiles.userId","=",$data['staffId'])  
            ->select('users.*','staff_profiles.*') 
            ->limit(1)
            ->get(); 
        $staffData = [];
        $arr = ['achivements','association_programs','fdp_meetings','papers','seminar_organiseds','seminar_attendeds','publications'];
        foreach($data as $d) {
            foreach($arr as $a) {
                if($d == $a) {
                    $temp = DB::table($d) 
                        ->where($d.".userId","=", $data['staffId'])
                        ->get(); 
                    $staffData[$d] = $temp;
                }
            }
        }
        $value_arr = ['achivements' => "Achivements",'association_programs' => "Association Programs",
                    'fdp_meetings' => "FDP Meetings",'papers' => 'Papers Presented',
                    'seminar_organiseds' => 'Seminar Organised','seminar_attendeds' => 'Seminar Attended',
                    'publications' => 'Publication'];

        return view("admin.viewReport")->with("staffData", $staffData)
            ->with("profile", $profile)
            ->with("value_arr", $value_arr);
    }
}
