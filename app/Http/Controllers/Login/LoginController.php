<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $findUser = DB::table('user')
            ->where('email', $email)
            ->value('password');

        $validator = Validator::make($request->all(), $request->rules(), $request->messages());

        if(!isset($findUser))
            return redirect()->back()->withErrors(['email' => 'email không tồn tại'])->withInput();
        if (!password_verify($password, $findUser))
            return redirect()->back()->withErrors(['password' => 'mật khẩu không chính xác'])->withInput();

        if (!$validator->fails() && password_verify($password, $findUser)) {
            $login = ['email' => $email, 'password' => $password];
            $request->session()->put('login', $login);
            return redirect('user/index');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }


    public function Logout()
    {
        Session::flush();
        return redirect('/');
    }
}
