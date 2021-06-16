<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function validationEmail(Request $request){
        $email = $request->email;

        $isEmail = true;
        if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $isEmail = false;
        }

        return view('index',compact('isEmail'));

    }
}
