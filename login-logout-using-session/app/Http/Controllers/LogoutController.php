<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    function logout(Request $request){
        $request->session()->flush();
        return view('layouts.login');
    }
}
