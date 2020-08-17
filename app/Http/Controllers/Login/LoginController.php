<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
