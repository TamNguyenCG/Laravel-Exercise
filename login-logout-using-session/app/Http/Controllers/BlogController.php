<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class BlogController extends Controller
{
    function showBlog(Request $request)
    {
        if ($request->session()->has('login') && $request->session()->get('login')) {
            return view('blogs.list');
        }
        $message = 'Bạn chưa đăng nhập !';
        $request->session()->flash('not-login',$message);
        return view('layouts.login');
    }
}
