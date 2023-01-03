<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
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
        return view('admin.index');
    }

    public function show($id)
    {
        //
        $data = Admin::where('id',$id)->first();
        return view('admin.profile', compact(
            'data'
        ));

    }
}
