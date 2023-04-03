<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    //
    public function display(){
        
        return view('loginandregister.login_register');
    }
}