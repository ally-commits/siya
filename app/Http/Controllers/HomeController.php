<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Users;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $value_arr = ['achivements' => "Achivements",'association_programs' => "Association Programs",
                    'fdp_meetings' => "FDP Meetings",'papers' => 'Papers Presented',
                    'seminar_organiseds' => 'Seminar Organised','seminar_attendeds' => 'Seminar Attended',
                    'publications' => 'Publication','guest_visiteds' => 'Guest Visited', 'guest_lecture_m_d_p_s'
                    => "Guest Lecture MDP", 'major_programmes' => 'Major Programmes'];
                    
        $icons = ['achivements' => "ti-flag-alt",'association_programs' => "ti-layout",
                    'fdp_meetings' => "ti-link",'papers' => 'ti-layers-alt',
                    'seminar_organiseds' => 'ti-bookmark-alt','seminar_attendeds' => 'ti-reload',
                    'publications' => 'ti-layers','guest_visiteds' => 'ti-car', 'guest_lecture_m_d_p_s'
                    => "ti-shift-left-alt", 'major_programmes' => 'ti-vector'];
        $value_count = [];
        $colors = ['text-danger','text-dark','text-info','text-warning','text-success','text-primary','text-secondary'];

        foreach($value_arr as $key=>$arr) {
            $value_count[$key] = DB::table($key)->where("userId",Auth::user()->id)->count();
        }  
        return view('staff.dashboard')->with("value_names",$value_arr)->with("value_count", $value_count)
                    ->with("icons",$icons)->with("colors", $colors);
    }
}
