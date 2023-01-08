<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdmController extends Controller
{
    //
    public function index()
    {
        return view('welcome', [
            'title' => 'Login'
        ]);
    }

    public function dashboard()
    {
        return view('super.index');
    }

    public function show($id)
    {
        //
        $data = Admin::where('id',$id)->first();
        return view('super.profile', compact(
            'data'
        ));

    }
}
