<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminStaffActivityController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($staffId) {
        $data = DB::table('users')
            ->join('staff_profiles', 'staff_profiles.userId', '=', 'users.id')  
            ->select('users.*','staff_profiles.*') 
            ->get();  
        return view("admin.staffActivity.manageStaffActivity")->with("staffs", $data);
        
    }
}
