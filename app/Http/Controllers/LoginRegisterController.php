<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginRegisterController extends Controller
{
    //
    public function display(){
        
        return view('loginandregister.login_register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        } else {
            return redirect()->route('login_register')->with('error', 'Invalid login details');
        }
    }
    
     
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);
        
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();
        
        Auth::login($user);
        
        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_register');
    }
}