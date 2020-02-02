<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class DeptLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('dept.login');
    }
    protected function guard(){
        return Auth::guard('dept');
    }
    use AuthenticatesUsers;

    protected $redirectTo = '/dept/dashboard';

    public function __construct()
    {
        $this->middleware('guest:dept')->except('logout');
    }
}
