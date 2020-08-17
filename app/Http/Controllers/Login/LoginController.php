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
        return view('login');
    }

    public function login(LoginRequest $request)
    {
//
//        if(!isset($findUser))
//            return redirect()->back()->withErrors(['email' => 'email không tồn tại'])->withInput();
//        if (!password_verify($password, $findUser))
//            return redirect()->back()->withErrors(['password' => 'mật khẩu không chính xác'])->withInput();
//
//        if (!$validator->fails() && password_verify($password, $findUser)) {
//            $login = ['email' => $email, 'password' => $password];
//            $request->session()->put('login', $login);
//            return redirect('user/index');
        $login = ['email' => $request->input('email'), 'password' => $request->input('password')];

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        if (Auth::attempt(array_merge($login, ['delete_flag' => '0']))) {
                $request->session()->put('login', $login);
                return redirect()->route('user.index');
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }


    public function Logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
