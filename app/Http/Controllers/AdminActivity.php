<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class AdminActivity extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index() {
        $value_arr = ['achivements' => "Achivements",'association_programs' => "Association Programmes",
                    'fdp_meetings' => "FDP Meetings",'papers' => 'Papers Presented',
                    'seminar_organiseds' => 'Seminar Organised','seminar_attendeds' => 'Seminar Attended',
                    'publications' => 'Publication','guest_visiteds' => 'Guest Visited', 'guest_lecture_m_d_p_s'
                    => "Guest Lecture MDP", 'major_programmes' => 'Major Programmes'];
        $icon = ['ti-map','ti-gift','ti-envelope','ti-archive','ti-vector','ti-receipt','ti-new-window',
                'ti-control-backward','ti-control-eject','ti-control-stop'];
        $color = ['text-danger','text-info','text-success','text-primary','text-secondary','text-warning',
                    'text-danger','text-info','text-primary','text-warning'];
        return view("admin.addActivity")->with("values", $value_arr)->with("color",$color)->with("icon",$icon);
    }
    public function getData($t) {  
        $table = DB::table($t)->get(); 
        if($t == "papers") {
            foreach($table as $tab) {
                if($tab->userId == 000) {
                    $tab->staffName = "Admin";
                } else {
                    $user = User::find($tab->userId);
                    $tab->staffName = $user['name'];
                }
            }
        } 
        switch($t) {
            case 'achivements': 
                return view('admin.activity.viewAchivement')->with("achive",$table);
                break;
            case 'association_programs':
                return view('admin.activity.viewAssociation')->with("programs",$table);
                break;
            case 'fdp_meetings':
                return view('admin.activity.viewMeeting')->with("meetings",$table);
                break;
            case 'papers':
                return view('admin.activity.viewPapers')->with("papers",$table);
                break;
            case 'seminar_organiseds':
                return view('admin.activity.viewSeminar')->with("seminar",$table);
                break;
            case 'seminar_attendeds':
                return view('admin.activity.viewSeminars')->with("seminar",$table);
                break;
            case 'publications':
                return view('admin.activity.viewPublications')->with("publications",$table);
                break;
            case 'guest_visiteds':
                return view('admin.activity.viewVisits')->with("visits",$table);
                break;
            case 'guest_lecture_m_d_p_s':
                return view('admin.activity.viewLectures')->with("lectures",$table);
                break;
            case 'major_programmes':
                return view('admin.activity.viewPrograms')->with("programs",$table);
                break;
            default:
                return view("welcome");
        }
    }
    public function getReport($t) {
        $table = DB::table($t)->get();
        if($t == "papers") {
            foreach($table as $tab) {
                if($tab->userId == 000) {
                    $tab->staffName = "Admin";
                } else {
                    $user = User::find($tab->userId);
                    $tab->staffName = $user['name'];
                }
            }
        } 
        $value_arr = ['achivements' => "Achivements",'association_programs' => "Association Programs",
                    'fdp_meetings' => "FDP Meetings",'papers' => 'Papers Presented',
                    'seminar_organiseds' => 'Seminar Organised','seminar_attendeds' => 'Seminar Attended',
                    'publications' => 'Publication','guest_visiteds' => 'Guest Visited', 'guest_lecture_m_d_p_s'
                    => "Guest Lecture MDP", 'major_programmes' => 'Major Programmes'];

        return view("admin.report.viewAllReport")->with("value_arr", $value_arr)->with("data",$table)->with("key",$t);
    }
}
