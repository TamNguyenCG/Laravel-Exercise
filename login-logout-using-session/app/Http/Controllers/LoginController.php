<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function showLogin()
    {
        return view('layouts.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $pass = $request->password;

        if($username == 'admin' && $pass == '123456'){
            $request->session()->push('login',true);
            return redirect()->route('show.blog');
        }
        $message = 'Đăng nhập không thành công. Tên người dùng hoặc mật khẩu không đúng.';
        $request->session()->flash('login-fail',$message);
        return view('layouts.login');
    }
}
