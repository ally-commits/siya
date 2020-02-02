<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dept.home');
    }
    
}
