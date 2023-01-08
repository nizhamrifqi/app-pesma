<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'title' => 'Login'
        ]);
    }

    public function dashboard()
    {
        return view('security.index');
    }

    public function show($id)
    {
        //
        $data = Admin::where('id',$id)->first();
        return view('index.profile', compact(
            'data'
        ));

    }
}
