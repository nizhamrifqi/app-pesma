<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nim' => ['required'],
            'password' => ['required'],
        ]);

        $request->session()->regenerate();

        //If fill form with data student
        if(Auth::guard('student')->attempt(['nim' =>strtoupper($request->nim) , 'password' => $request->password])){
            return redirect()->route('dashboard-student');
        };
        
        //If fill form with data admin
        if (Auth::guard('admin')->attempt( ['username' =>$request->nim , 'password' => $request->password, 'status' => '1'] )){
            return redirect()->route('dashboard-super');
        }elseif(Auth::guard('admin')->attempt( ['username' =>$request->nim , 'password' => $request->password, 'status' => '2'] )){
            return redirect()->route('dashboard-admin');
        }elseif(Auth::guard('admin')->attempt( ['username' =>$request->nim , 'password' => $request->password, 'status' => '3'] )){
            return redirect()->route('dashboard-security');
        }
        

        // if (Auth::attempt($credentials)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }

        return back()->with('loginError','Login Failed!');
    }

    public function logout() //Cara penganti $request
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}